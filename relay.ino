#include <WiFi.h>
#include <HTTPClient.h>
#include <WiFiClientSecure.h>
#include <ArduinoJson.h>

const char* ssid = "sls";
const char* password = "spelabsa";

const char* rootCACertificate = \
"-----BEGIN CERTIFICATE-----\n"\
"MIIDqTCCA06gAwIBAgIQPXK2UE7LGrMNzma+BU8+5TAKBggqhkjOPQQDAjA7MQsw\n"\
"CQYDVQQGEwJVUzEeMBwGA1UEChMVR29vZ2xlIFRydXN0IFNlcnZpY2VzMQwwCgYD\n"\
"VQQDEwNXRTEwHhcNMjQwOTA3MjAxNzE5WhcNMjQxMjA2MjAxNzE4WjAXMRUwEwYD\n"\
"VQQDEwxnb29kZWRpYS5jb20wWTATBgcqhkjOPQIBBggqhkjOPQMBBwNCAARKPZPR\n"\
"7kcsYnzp3+EQyzYPjBfdRAC3BhL2lFMWoPVMh7yWysYo2wUyPTBndpOnmaHRypB/\n"\
"WDxPcS9Ey2PPgUUZo4ICVjCCAlIwDgYDVR0PAQH/BAQDAgeAMBMGA1UdJQQMMAoG\n"\
"CCsGAQUFBwMBMAwGA1UdEwEB/wQCMAAwHQYDVR0OBBYEFNOYcN+1njFAK3q4tufj\n"\
"kSsW+9CCMB8GA1UdIwQYMBaAFJB3kjVnxP+ozKnme9mAeXvMk/k4MF4GCCsGAQUF\n"\
"BwEBBFIwUDAnBggrBgEFBQcwAYYbaHR0cDovL28ucGtpLmdvb2cvcy93ZTEvUFhJ\n"\
"MCUGCCsGAQUFBzAChhlodHRwOi8vaS5wa2kuZ29vZy93ZTEuY3J0MCcGA1UdEQQg\n"\
"MB6CDGdvb2RlZGlhLmNvbYIOKi5nb29kZWRpYS5jb20wEwYDVR0gBAwwCjAIBgZn\n"\
"gQwBAgEwNgYDVR0fBC8wLTAroCmgJ4YlaHR0cDovL2MucGtpLmdvb2cvd2UxL3Jk\n"\
"b1phUC1DRTRZLmNybDCCAQUGCisGAQQB1nkCBAIEgfYEgfMA8QB3AO7N0GTV2xrO\n"\
"xVy3nbTNE6Iyh0Z8vOzew1FIWUZxH7WbAAABkc5ZPGYAAAQDAEgwRgIhAK64KJIm\n"\
"M3mDt+/A8ONJbFK7qA5rrU8BJj/Lo7PIwgQTAiEAttY7B+jgKeA3wcjwq+6ObJIp\n"\
"kKQ0fUX+WOSe4fa8yH8AdgA/F0tP1yJHWJQdZRyEvg0S7ZA3fx+FauvBvyiF7Phk\n"\
"bgAAAZHOWTx2AAAEAwBHMEUCIFZamvGwnU35UjSqFoYnrubHlUTJXpPLHpttXSpe\n"\
"bXkLAiEAhXZg4xdCkwCJ1QUKPdtRfdP/dsalZXYhBbttfvbwpkwwCgYIKoZIzj0E\n"\
"AwIDSQAwRgIhAMPaDImMUNu3XHvqcaHYCQ70b1WlPZUHm0LEK6HY6wVoAiEAjWlR\n"\
"9in3uPy0A47nb7SRpG2/tlCotSZURq1Nu6Vtslk=\n"\
"-----END CERTIFICATE-----\n";

String host = "https://iot.goodedia.com";
String token = "yc4gMjlwv5";

#define relay_lampu  27
#define relay_kipas 26

void setup(){
  Serial.begin(115200);
  pinMode(relay_lampu,OUTPUT);
  pinMode(relay_kipas, OUTPUT);

  WiFi.mode(WIFI_STA); //Optional
  WiFi.begin(ssid, password);
  Serial.println("\nConnecting");

  while(WiFi.status() != WL_CONNECTED){
      Serial.print(".");
      delay(200);
  }
}

void toggle_btn_lampu(){

  String Link;
  HTTPClient https;

  Link = host + "/api/simple_api.php?token=" + token;
  https.begin(Link);
  int httpResponseCode = https.GET();
  if(httpResponseCode <=  0){
    Serial.print("Error Code :");
    Serial.println(httpResponseCode);
  }
  // Buka JSON
  String response = https.getString();
  Serial.println(response);
  char json[500];
  response.toCharArray(json,500);
  StaticJsonDocument<200> doc;
  deserializeJson(doc, json);
  String lampu = doc["data"]["lampu"];
  Serial.print("Lampu = ");
  Serial.println(lampu);
  Serial.println(WiFi.localIP());
  // jika lampu = 0, maka pin low, sebaliknya
  if(lampu == "0"){
    digitalWrite(relay_lampu, HIGH);
  }
  if (lampu == "1"){
    digitalWrite(relay_lampu, LOW);
  }
}

void toggle_btn_kipas(){

  String Link;
  HTTPClient https;

  Link = host + "/api/simple_api.php?token=" + token;
  https.begin(Link);
  int httpResponseCode = https.GET();
  if(httpResponseCode <=  0){
    Serial.print("Error Code :");
    Serial.println(httpResponseCode);
  }
  // Buka JSON
  String response = https.getString();
  Serial.println(response);
  char json[500];
  response.toCharArray(json,500);
  StaticJsonDocument<200> doc;
  deserializeJson(doc, json);
  // Buat variable dari setiap key yg ada di data, lampu, kipas, jemuran
  String kipas = doc["data"]["kipas"];
  // Serial.println(json);
  Serial.print("Kipas = ");
  Serial.println(kipas);
  Serial.println(WiFi.localIP());
  // jika lampu = 0, maka pin low, sebaliknya
  if(kipas == "0"){
    digitalWrite(relay_kipas, HIGH);
  }
  if (kipas == "1"){
    digitalWrite(relay_kipas, LOW);
  }
}

void loop(){
  toggle_btn_lampu();
  toggle_btn_kipas();
  delay(10000);
}