#include "LionESP.h"

bool LionESP::WiFiConnect(const char* ssid, const char* password) {
    WiFi.begin(ssid, password);
    while (WiFi.status() != WL_CONNECTED) {
        //this->LEDBlinks(pin, uint8 await);
    }
    return true;
}