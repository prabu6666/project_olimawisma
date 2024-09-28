#include <AccelStepper.h>
#define motorPin1 14
#define motorPin2 12
#define motorPin3 13
#define motorPin4 27
#define MotorInterfaceType 8
#define RAIN_PIN 35
#define LDR_PIN 32
AccelStepper stepper = AccelStepper(MotorInterfaceType,
motorPin1, motorPin3, motorPin2, motorPin4);

void setup() {
    pinMode(RAIN_PIN,INPUT);
    pinMode(LDR_PIN, INPUT);
    stepper.setMaxSpeed(1000);
    stepper.setAcceleration(900);
    Serial.begin(115200);
}

void loop() {
  int data_air = analogRead(RAIN_PIN);
  int data_ldr = analogRead(LDR_PIN);
  Serial.println(data_ldr);
  Serial.println(data_air);

  if((data_ldr <= 2000) && (data_air >= 3000)){
    stepper.runToNewPosition(5900);
  }
  if((data_ldr >= 3000) || (data_air <= 3000)){
    stepper.runToNewPosition(0);
  }
  delay(3000);
 }
