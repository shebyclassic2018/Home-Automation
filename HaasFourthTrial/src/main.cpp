

#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include "ArduinoJson.h"

const char* ssid = "Classic Media";
const char* password = "uvos5775";

//Your Domain name with URL path or IP address with path
String serverName = "http://172.20.10.3/MyProject/php/phpForEsp8266/getApplianceState.php";

unsigned long lastTime = 0;
uint8 scanning_pin = 2;
uint8 success_pin = 5;
uint8 server_pin = 14;

unsigned long timerDelay = 5000;
void changeState(JsonArray &root);
void alertWiFiNotConnected();
void alertWifiConnected();
void alertServerIsUnreachable(bool reachability);

void setup() {
  Serial.begin(115200); 
  int pins[] = {2, 4, 5, 12, 13, 14, 15, 16};
  
  int i;
  for (i = 0; i < 8; i++) {
    pinMode(pins[i], OUTPUT);
    digitalWrite(pins[i], LOW);
  }

  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) {
    alertWiFiNotConnected();
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
 
  Serial.println("Timer set to 5 seconds (timerDelay variable), it will take 5 seconds before publishing the first reading.");
}

void loop() {
    //Check WiFi connection status
    if(WiFi.status() == WL_CONNECTED){
      WiFiClient client;
      HTTPClient http;
      
      // Your Domain name with URL path or IP address with path
      http.begin(client, serverName.c_str());
      alertWifiConnected();

      // Send HTTP GET request
      int httpResponseCode = http.GET();
      
      if (httpResponseCode>0) {
        alertServerIsUnreachable(false);
        Serial.print("HTTP Response code: ");
        Serial.println(httpResponseCode);
        String payload = http.getString();

        const size_t bufferSize = JSON_ARRAY_SIZE(1024) + 20;
        DynamicJsonBuffer jsonBuffer(bufferSize);
        JsonArray &root = jsonBuffer.parseArray(payload);
        changeState(root);
        delay(1000);
      }
      else {
        Serial.print("Error code: ");
        Serial.println(httpResponseCode);
        alertServerIsUnreachable(true);
      }
      // Free resources
      http.end();
    }
    else {
      Serial.println("WiFi Disconnected");
      alertWiFiNotConnected();
    }
}

void changeState(JsonArray &root) {
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
    for (int i = 0; i < rows; i++)
    {
        //light up
        if (state[i] == 1)
        {
            Serial.print("Pin ");
            Serial.print(pins[i]);
            Serial.println(" is ON");
            digitalWrite(pins[i], HIGH);
        }
        else
        {
            Serial.print("Pin ");
            Serial.print(pins[i]);
            Serial.println(" is OFF");
            digitalWrite(pins[i], LOW);
        }
    }
    // NL();

    for (i = 0; i < rows; i++)
    {
        if (sync[i] == 1)
        {
            Serial.print("pin ");
            Serial.print(pins[i]);
            Serial.println(" Synced");
            // scheduledAppliance(pins[i], state[i]);
        }
        else
        {
            Serial.print("pin ");
            Serial.print(pins[i]);
            Serial.println("  Not Synced");
        }
    }
}

void alertWiFiNotConnected() {
    digitalWrite(success_pin, LOW);
    digitalWrite(server_pin, LOW);
    digitalWrite(scanning_pin, HIGH);
    delay(500);
    digitalWrite(scanning_pin, LOW);
    delay(500);
}

void alertWifiConnected() {
  digitalWrite(success_pin, HIGH);
}

void alertServerIsUnreachable(bool unreachable) {
  digitalWrite(server_pin, unreachable);
  if (unreachable) {
    digitalWrite(server_pin, LOW);
    delay(500);
    digitalWrite(server_pin, HIGH);
    delay(500);
  }
}