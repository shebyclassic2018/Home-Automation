#include <Arduino.h>
#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>
#include <FS.h>
#include "../ArduinoJson.h"


class LionESP{
    public :
        bool WiFiConnect(const char * ssid, const char * password);
        void readFS(char * filename, char mode );
        bool writeFS(char * filename, char * content);
        void LEDBlinks(uint8 pin, uint8 await);
};