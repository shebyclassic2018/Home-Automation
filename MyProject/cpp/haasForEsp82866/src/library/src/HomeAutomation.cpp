#include "../HomeAutomation.h"

void Serial_Begin(int speed)
{
    Serial.begin(speed);
}

void esp::NL()
{
    Serial.println("");
}

void esp::sr(String str)
{
    Serial.print(str);
}

void esp::srline(String str)
{
    Serial.println(str);
}

// Set WiFi Credentials
void esp::MyWifiCredentials(const char *ssid, const char *password)
{
    this->ssid = ssid;
    this->password = password;
}

// Pin Mode to OUTPUT
void esp::pinModeOutput(int pins[], int n)
{
    int i;
    for (i = 0; i < n; i++)
    {
        pinMode(pins[i], OUTPUT);
    }
}

// Connect to WiFi Network
void esp::ESP8266WiFiConnect(const char *ssid, const char *password)
{
    MyWifiCredentials(ssid, password);
    WiFi.begin(this->ssid, this->password);

    NL();
    Serial.print("Connecting to ");
    Serial.println(this->ssid);

    while (WiFi.status() != WL_CONNECTED)
    {
        Serial.print(".");
        digitalWrite(5, LOW);
        digitalWrite(16, LOW);
        digitalWrite(12, HIGH);
        delay(500);
        digitalWrite(12, LOW);
        delay(500);
    }
}

// Check if WiFi connected
bool esp::CheckIfESP8266WiFiConnected()
{
    if (WiFi.status() == WL_CONNECTED)
    {
        // WiFi_OK used to print only once in a serial Monitor
        if (!WiFi_OK)
        {
            NL();
            NL();
            srline("Connected");
            sr("Module IP Address: ");
            Serial.println(WiFi.localIP());
            WiFi_OK = true;
        }
        digitalWrite(5, HIGH);
        delay(2000);
        digitalWrite(5, LOW);
        delay(2000);
        this->WiFi_CONNECTED = true;
        return true;
    }
    else
    {   
        this->WiFi_CONNECTED = false;
        digitalWrite(5, LOW);
        digitalWrite(12, HIGH);
        delay(500);
        digitalWrite(12, LOW);
        delay(500);
        return false;
    }
}

// Send request to Server
int esp::ESP8266HTTPRequest(char host[])
{
    //, "5B FB D1 D4 49 D3 0F A9 C6 40 03 34 BA E0 24 05 AA D2 E2 01"
    this->httpObj.begin(host);
    int httpCode = this->httpObj.GET();
    if (httpCode == -1)
    {
        if (!this->HTTP_NOT_OK)
        {
            NL();
            Serial.println(host);
            srline("Destination unreachable:");
            this->HTTP_OK = false;
            this->HTTP_NOT_OK = true;
        }
    }
    else if (httpCode == 200)
    {
        if (!this->HTTP_OK)
        {
            NL();
            srline("Status code: 200 destionation reachable:");
            this->HTTP_OK = true;
        }
    }
    else
    {
        NL();
        sr("Unknown error occurs, Code ");
        Serial.println(httpCode);
        this->HTTP_OK = false;
    }

    this->HTTP_CODE = httpCode;
    return httpCode;
}

// Get string from server
String esp::getJSON()
{
    String json = this->httpObj.getString();
    return json;
}

// Post String to server

// Convert JSON data to Array
JsonArray &esp::jsonToArray(String data)
{
    const size_t bufferSize = JSON_ARRAY_SIZE(1024) + 20;
    DynamicJsonBuffer jsonBuffer(bufferSize);
    JsonArray &root = jsonBuffer.parseArray(data);
    return root;
}

// Get Array from JSON
JsonArray &esp::ArrayFromExternalFile(char host[])
{
    String payload = getJSON();
    JsonArray &root = jsonToArray(payload);
    return root;
}

// Turn On and Turn Off appliances
void haas::turnOnOff(JsonArray &root)
{
    int i, j, pins[16], state[16], sync[16];
    const char *val;
    int rows = root[0][2];

    for (i = 0; i < rows; i++)
    {
        for (j = 0; j < 9; j++)
        {
            if (j == 0)
            {
                val = root[i][j];
                pins[i] = atoi(val);
            }
            else if (j == 1)
            {
                val = root[i][j];
                state[i] = atoi(val);
            }
            else if (j == 3)
            {
                val = root[i][j];
                //char a[] = val;
                //startingTime[i] = val;
            }
            else if (j == 4)
            {
                val = root[i][j];
            }
            else if (j == 7)
            {
                val = root[i][j];
                sync[i] = atoi(val);
            }
        }
    }

    //Turn_Off_ON
    //lighting for loop
    for (int i = 0; i <= rows; i++)
    {
        //light up
        if (state[i] == 1)
        {
            Serial.println("ON");
            digitalWrite(pins[i], HIGH);
        }
        else
        {
            Serial.println("OFF");
            digitalWrite(pins[i], LOW);
        }
    }
    NL();

    for (i = 0; i < rows; i++)
    {
        if (sync[i] == 1)
        {
            Serial.print("pin ");
            Serial.print(pins[i]);
            Serial.println(" Synced");
            scheduledAppliance(pins[i], state[i]);
        }
        else
        {
            Serial.print("pin ");
            Serial.print(pins[i]);
            Serial.println("  Not Synced");
        }
    }
}

// SCHEDULE CLASS

void haas::scheduledAppliance(int pin, int state)
{
    int smin, shr, ehr, emin, curr_time, curr_min, startingTime[10][3], endingTime[10][3];
    const char *hr, *min;
    char host[] = "http://192.168.43.172/MyProject/php/phpForEsp8266/schedule/current-time.php";
    char host_app[] = "http://192.168.43.172/MyProject/php/phpForEsp8266/getApplianceState.php";

    // char host[] = "http://172.20.10.2/MyProject/php/phpForEsp8266/schedule/current-time.php";
    // char host_app[] = "http://172.20.10.2/MyProject/php/phpForEsp8266/getApplianceState.php";
    int httpCode = ESP8266HTTPRequest(host);
    if (httpCode > 0)
    {
        String json = getJSON();
        JsonArray &arr = jsonToArray(json);
        // CURRENT HOUR AND MINUTE
        const char *hour = arr[0];
        curr_time = atoi(hour);
        const char *cmin = arr[1];
        curr_min = atoi(cmin);

        int code = ESP8266HTTPRequest(host_app);
        if (code > 0)
        {
            String json = getJSON();
            JsonArray &root = jsonToArray(json);
            int rows = root[0][2];
            // const char *shr = root[0][3];
            // const char *smin = root[0][4];
            // Serial.print("Hour : ");
            // Serial.println(shr);

            // Serial.print("Minute : ");
            // Serial.println(smin);

            for (int i = 0; i < rows; i++)
            {

                // Get sync status
                const char *sync = root[i][7];
                int syncStatus = atoi(sync);
                if (syncStatus == 1)
                {
                    const char *PIN = root[i][0];
                    int scpin = atoi(PIN);
                    // STARTING TIME
                    hr = root[i][3];
                    shr = atoi(hr);

                    min = root[i][4];
                    smin = atoi(min);

                    startingTime[i][0] = scpin;
                    startingTime[i][1] = shr;
                    startingTime[i][2] = smin;

                    // ENDING TIME
                    hr = root[i][5];
                    ehr = atoi(hr);

                    min = root[i][6];
                    emin = atoi(min);

                    endingTime[i][0] = scpin;
                    endingTime[i][1] = ehr;
                    endingTime[i][2] = emin;
                }
            }

            for (int i = 0; i < rows; i++)
            {
                Serial.print("Pin-");
                Serial.print(i);
                Serial.print(" - ");
                Serial.print(startingTime[i][0]);
                Serial.print(" Time ");
                Serial.print(startingTime[i][1]);
                Serial.print(":");
                Serial.print(startingTime[i][2]);

                Serial.print(" - ");
                Serial.print(endingTime[i][1]);
                Serial.print(":");
                Serial.println(endingTime[i][2]);
                Serial.print("Current Time : ");
                Serial.println(curr_time);

                
                // STARTING TIMe
                if (startingTime[i][1] == curr_time && startingTime[i][2] == curr_min)
                {
                    Serial.println("It's OK");
                    digitalWrite(startingTime[i][0], HIGH);
                }

                //ENDING TIME
                if (endingTime[i][1] == curr_time && endingTime[i][2] == curr_min)
                {
                    Serial.println("It's nO");
                    digitalWrite(endingTime[i][0], LOW);
                }
            }
        }
    }
}

void haas::TemperatureReader(char host[]) {
    HTTPClient http;
    int outputpin = A0;
    int analogValue = analogRead(outputpin);
    float millivolts = (analogValue/1024.0) * 500;
    float celcius = millivolts / 10;

    http.begin(host);
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    String postedData = "temp="+String(celcius,2);
    int response = http.POST(postedData);

    //---------- Here is the calculation for Fahrenheit ----------//
    Serial.print(" in Celcius=   ");
    Serial.println(celcius);
    float fahrenheit = ((celcius * 9)/5 + 32);
    Serial.print(" in Farenheit=   ");
    Serial.println(fahrenheit);
    Serial.print(" Response=   ");
    Serial.println(response);
}
