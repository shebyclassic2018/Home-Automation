#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <string.h>
#include <stdlib.h>
#include "ArduinoJson.h"

void Serial_Begin(int speed);

class esp
{
private:
    const char *ssid;
    const char *password;
    bool WiFi_OK = false;
    bool HTTP_OK = false;
    int HTTP_CODE = -1;
    bool HTTP_NOT_OK = false;
    bool WiFi_CONNECTED = false;
    void sr(String str);
    void srline(String str);
    void MyWifiCredentials(const char *ssid, const char *password);

public:
    HTTPClient httpObj;
    int ESP8266HTTPRequest(char host[]);

    void NL();
    void ESP8266WiFiConnect(const char *ssid, const char *password);
    bool CheckIfESP8266WiFiConnected();
    void pinModeOutput(int pins[], int n);

    String getJSON();

    JsonArray &jsonToArray(String data);
    JsonArray &ArrayFromExternalFile(char host[]);
};

class haas : private esp
{
public:
    void TemperatureReader(char host[]);
    void turnOnOff(JsonArray &root);
    void scheduledAppliance(int pin, int state);
};
