#include WiFi.h
#include HTTPClient.h
#include Ultrasonic.h
#include ESP32Servo.h
#include esp_now.h
#include Keypad.h
#include LiquidCrystal_I2C.h

void state1();
void state2();
void sendData(String inputData);

const char ssid = Xiaomi XMMNTHQ;
const char password = g0kilg0kil;
const char serverName = httpscerbin.my.idskrip.php;
const char serverName2 = httpscerbin.my.idskrip2.php;
const int serialBaudRate = 115200;

const int LED_BUILTIN = 2; 
int currentState = 1;

 int trigPin = 5;
 int echoPin = 18;
 int duration;
 int distance;


const byte ROWS = 4;  Number of rows
const byte COLS = 4;  Number of columns

int lcdColumns = 16;
int lcdRows = 2;

char keys[ROWS][COLS] = {
  {'1','2','3','A'},
  {'4','5','6','B'},
  {'7','8','9','C'},
  {'','0','#','D'}
};

byte rowPins[ROWS] = {25, 26, 27, 15};    Row pins connected to ESP32 GPIOs (connect from left to right)
byte colPins[COLS] = {13, 32, 33, 23};    Column pins connected to ESP32 GPIOs

Keypad keypad = Keypad(makeKeymap(keys), rowPins, colPins, ROWS, COLS);
String inputString = ;  Variable to store the keypad input

LiquidCrystal_I2C lcd(0x27, lcdColumns, lcdRows);


unsigned long waktu = 0;
unsigned long batasWaktu = 10000;

const int inductivePin = 2;

#define SERVO_PIN 12
Servo myservo;
String nim;

uint8_t broadcastAddress[] = {0x30, 0xC6, 0xF7, 0x21, 0x55, 0xF0};   gantii duluu uplaod dulu nanti ketauan mac id

typedef struct struct_message {
  char payload[128];
} struct_message;

struct_message myData;

void OnDataRecv(const uint8_t mac_addr, const uint8_t data, int data_len) {
  memcpy(&myData, data, sizeof(myData));

  Serial.print(Received data );
  Serial.println(myData.payload);
}

void setup() {
  
  Serial.println();
  WiFi.mode(WIFI_STA);
            Serial.println(WiFi.macAddress());


  if (esp_now_init() != ESP_OK) {
    Serial.println(Error initializing ESP-NOW);
    return;
  }

  esp_now_register_recv_cb(OnDataRecv);

  esp_now_peer_info_t peerInfo;
  memcpy(peerInfo.peer_addr, broadcastAddress, 6);
  peerInfo.channel = 0;
  peerInfo.encrypt = false;

  if (esp_now_add_peer(&peerInfo) != ESP_OK) {
    Serial.println(Failed to add peer);
    return;
  }

  
  pinMode(trigPin, OUTPUT); 
  pinMode(echoPin, INPUT);
  Serial.begin(serialBaudRate);
  WiFi.begin(ssid, password);
  pinMode(LED_BUILTIN, OUTPUT);

      myservo.attach(SERVO_PIN);
    myservo.write(90);  Set initial position to 90 degrees  


  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println(Connecting to WiFi...);
  }

  Serial.println(Connected to WiFi);

  lcd.init();
   turn on LCD backlight
  lcd.backlight();
   begin Serial communication
  lcd.setCursor(0, 0);
  lcd.print(Masukkan NIM);
  lcd.setCursor(0, 1);
  lcd.print(Atau Scan QR);
}

void loop() {
  switch (currentState) {
    case 1
      state1();
      break;

    case 2
      state2();
      break;

     Add more cases for other states if needed

    default
      break;
  }
}


void state1(){
  char key = keypad.getKey();

if (key == '#') {
  lcd.clear();
  lcd.setCursor(0, 0);
  Serial.println(Tombol # ditekan);
  lcd.print(Data Diterima);
  delay(3000);
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print(Sending Data...);
  lcd.setCursor(0, 1);
  lcd.print(                );  Membersihkan baris kedua
  String inputData = inputString;
  inputString = ;
  sendData(inputData);
} else if (key == '') {
  lcd.clear();
  lcd.setCursor(0, 0);
  Serial.println(Tombol  ditekan);
  if (inputString.length()  0) {
    inputString = inputString.substring(0, inputString.length() - 1);
    lcd.print(Masukkan NIM);
    lcd.setCursor(0, 1);
    lcd.print(inputString);
  }
  } else if (key) {
    inputString += key;
    lcd.setCursor(0, 1);
    lcd.print(                );  Membersihkan baris kedua
    lcd.setCursor(0, 1);
    lcd.print(inputString);
    Serial.println(key);
    Serial.println(inputString);
}

  if (strlen(myData.payload)  0) {
    String inputData = String(myData.payload);
    sendData(inputData);

    
  }
}

void state2(){

  digitalWrite(trigPin, LOW); 
  delayMicroseconds(2);
  digitalWrite(trigPin, HIGH); 
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  duration = pulseIn(echoPin, HIGH);
  distance= duration0.0342;
  Serial.println(distance);
  String inputData;
  inputData.trim();
  HTTPClient http;
   Menggabungkan URL dengan parameter menggunakan strcat()
  char url[200];
  strcpy(url, serverName);
  strcat(url, data=);

         Melakukan permintaan GET dan mendapatkan respons
  http.begin(url);
  int httpResponseCode = http.GET();
  String response = http.getString();
  if (httpResponseCode == HTTP_CODE_OK) {
    Serial.println(Response from server);
  }

  if (distance  5){
    lcd.clear();
    lcd.setCursor(0, 0);
    lcd.print(Botol Terdeteksi);
    Serial.println(Botol Terdeteksi);
    delay(2000);
    int sensorState = digitalRead(inductivePin);
      if (sensorState == LOW) {
        lcd.clear();
        lcd.setCursor(0, 0);
        lcd.print(Botol Logam);
        lcd.setCursor(0, 1);
        lcd.print(+2 Poin);
        Serial.println(Botol Logam);
        myservo.write(180);  Rotate servo to 180 degrees
        delay(2000);
        Serial.println(Nambah 2 Point);
        inputData = 2;
        Serial.println(nim);
        char url2[200];
        strcpy(url2, serverName2);
        strcat(url2, data=);
        strcat(url2, inputData.c_str());
        strcat(url2, &nim=);
        strcat(url2, nim.c_str());


        http.begin(url2);
        int httpResponseCode = http.GET();
        String response = http.getString();
        Serial.println(response);
        } 
      else {
        lcd.clear();
        lcd.setCursor(0, 0);
        lcd.print(Botol Plastik);
        lcd.setCursor(0, 1);
        lcd.print(+1 Poin);
        Serial.println(Botol Plastik);
        myservo.write(0);  Rotate servo to 0 degrees
        delay(2000);
        Serial.println(Nambah 1 Point);
        inputData = 1;
        Serial.println(nim);
        char url2[200];
        strcpy(url2, serverName2);
        strcat(url2, data=);
        strcat(url2, inputData.c_str());
        strcat(url2, &nim=);
        strcat(url2, nim.c_str());


        http.begin(url2);
        int httpResponseCode = http.GET();
        String response = http.getString();
        Serial.println(response);
      }
        myservo.write(90);
        delay(2000);
        waktu = millis();
        }
    else{
      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print(Masukkan Botol!);
      Serial.println(Masukkan Botol);

    }
      Serial.print(waktu saat ini = );
      unsigned long bedaWaktu = millis()-waktu;
      Serial.println(bedaWaktu);
      memset(&myData, 0, sizeof(myData));  set ke null data payload dar qr

if(millis()-waktu  batasWaktu ){
  currentState = 1;
  lcd.clear();
   Serial.println(masuk state 1 bos);
  lcd.setCursor(0, 0);
  lcd.print(Masukkan NIM);
  lcd.setCursor(0, 1);
  lcd.print(Atau Scan QR);
}

     
}

void sendData(String inputData){
  if (inputData.length()  0) {
      Serial.print(Sending data );
      Serial.println(inputData);

       Membuat koneksi HTTP
      HTTPClient http;

       Menggabungkan URL dengan parameter menggunakan strcat()
      char url[200];
      strcpy(url, serverName);
      strcat(url, data=);
      strcat(url, inputData.c_str());

       Melakukan permintaan GET dan mendapatkan respons
      http.begin(url);
      int httpResponseCode = http.GET();
      String response = http.getString();

      if (httpResponseCode == HTTP_CODE_OK) {
        Serial.println(Response from server);
        Serial.println(response);

        if (response == false) {
          lcd.clear();
          lcd.setCursor(0, 0);
          lcd.print(Nim Anda Salah.);
          delay(3000);
          Serial.println(Data Tidak Ada di database);
           memset(&myData, 0, sizeof(myData));  set ke null data payload dar qr
          digitalWrite(LED_BUILTIN, LOW);
          lcd.clear();
          lcd.setCursor(0, 0);
          lcd.print(Masukkan NIM);
          lcd.setCursor(0, 1);
          lcd.print(Atau Scan QR);
        } else {
          lcd.clear();
          lcd.setCursor(0, 0);
          lcd.print(Wait...);
          delay(1000);
          Serial.println(Data Ada di database);
          currentState = 2;
          digitalWrite(LED_BUILTIN, HIGH);
          nim = inputData;

        }
      } else {
        Serial.print(Error code  );
        Serial.println(httpResponseCode);
      }
      http.end();
      waktu = millis();

    }
}
