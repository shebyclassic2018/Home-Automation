//http://172.20.10.2/MyProject/php/phpForEsp8266/getApplianceState.php
#include "library/HomeAutomation.h"

esp obj;
haas obj1;

char host[] = "http://172.20.10.2/MyProject/php/phpForEsp8266/getApplianceState.php";
char tempRoute[] = "http://172.20.10.2/MyProject/php/phpForEsp8266/post-temparature.php";
void setup()
{
  Serial_Begin(115200);
  int pins[] = {2, 4, 5, 12, 13, 14, 15, 16};
  obj.pinModeOutput(pins, 8);
  obj.ESP8266WiFiConnect("Classic Media", "uvos5577");
}

void loop()
{
  if (obj.CheckIfESP8266WiFiConnected())
  {
    int httpCode = obj.ESP8266HTTPRequest(host);
    //Serial.println(httpCode);
    if (httpCode > 0)
    {
      
      String json = obj.getJSON();
      //Serial.println(json);
      JsonArray &arr  = obj.jsonToArray(json);
      obj1.turnOnOff(arr);
    }
    obj1.TemperatureReader(tempRoute);
  }
  // delay(1000);
}
