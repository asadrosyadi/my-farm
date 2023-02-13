#ifdef ESP32
  #include <WiFi.h>
  #include <HTTPClient.h>
#else
  #include <ESP8266WiFi.h>
  #include <ESP8266HTTPClient.h>
  #include <WiFiClient.h>
#endif

#include <Wire.h>
#include <Adafruit_Sensor.h>
#include <Arduino.h>
#include <WiFiMulti.h>
#include <DNSServer.h>
#include <WebServer.h>
#include <WiFiManager.h> 
#include <SoftwareSerial.h>
#include <ESPmDNS.h>
#include <Update.h>
#include <Arduino_JSON.h>
#include <OneWire.h>
#include <Arduino_JSON.h>
#include <ESP32Servo.h>
#include "DFRobot_ESP_PH.h"
#include "EEPROM.h"
#include "DHT.h"
DFRobot_ESP_PH ph;
#include <OneWire.h>
#include <DallasTemperature.h>
#include "MQ135.h"
#include <BH1750.h>
#define USE_SERIAL Serial

#define ESPADC 4096.0   //the esp Analog Digital Convertion value
#define ESPVOLTAGE 3.3 //the esp voltage supply value

#define pompapupuk 2
#define pompavitaminikan 0
#define pemanas 15 // TDO
//#define servo 26
#define PH_PIN_akuarium 36 // pin PH Akuarium
#define PH_PIN_terarium 35 // pin PH Terarium
#define suhuterarium 32 //kelembapan & suhu terarium
#define DHTTYPE DHT22
#define TdsSensorPin 36 //TDS ambil pin PH terarium 
#define VREF 3.3      // analog reference voltage(Volt) of the ADC
#define SCOUNT  30           // sum of sample point
#define gasMQ135 34 //gas
#define SOUND_SPEED 0.034
#define pompa1 18
#define pompa2 17
#define uv1 16
#define uv2 5
#define kipas 23

#define ESPADC 4096.0   //the esp Analog Digital Convertion value
#define ESPVOLTAGE 3.3 //the esp voltage supply value

#define pompapupuk 2
#define pompavitaminikan 0
#define pemanas 15 // TDO
//#define servo 26
#define PH_PIN_akuarium 36 // pin PH Akuarium
#define PH_PIN_terarium 35 // pin PH Terarium
#define suhuterarium 32 //kelembapan & suhu terarium
#define DHTTYPE DHT22
#define TdsSensorPin 36 //TDS ambil pin PH terarium 
#define VREF 3.3      // analog reference voltage(Volt) of the ADC
#define SCOUNT  30           // sum of sample point
#define gasMQ135 34 //gas
#define SOUND_SPEED 0.034
#define pompa1 18
#define pompa2 17
#define uv1 16
#define uv2 5
#define kipas 23

BH1750 lightMeter;
const int trigPinvitamin = 11; // cmd
const int echoPinvitamin = 27; 
const int trigPinpupuk = 8; //SD1
const int echoPinpupuk = 4;

const int oneWireBus = 12; // suhu akuarium TDI
OneWire oneWire(oneWireBus);
DallasTemperature sensors(&oneWire);
DHT dht(suhuterarium, DHTTYPE);
float voltage, phValue_akuarium,phValue_terarium, hasilphakuarium,hasilphterarium, temperature = 25;;
Servo myservo;     // variable untuk menyimpan posisi data
int pos = 00;
int analogBuffer[SCOUNT];    // store the analog value in the array, read from ADC
int analogBufferTemp[SCOUNT];
int analogBufferIndex = 0,copyIndex = 0;
float averageVoltage = 0,tdsValue = 0,temperature3 = 25;
long durationvitamin;
float distanceCmvitamin;
long durationpupuk;
float distanceCmpupuk;
int pwmuv = 0;
int pwmpompa = 0;

WebServer server(80);
const char* host = "192.168.8.128";

const char* serverName = "http://rest.myfarmportable.com/data_sensor.php";
String apiKeyValue = "uTh3tZ16pXOdaQm8";
String HWID = "BKV50002";

//schedule
String sensorReadings_getschedule;
float sensorReadingsArr_getschedule[3];
const char* serverName_getschedule = "http://apps.myfarmportable.com/rest/dataapijson?HWID=BKV50002";

/* Style connect */
String style =
"<style>#file-input,input{width:100%;height:44px;border-radius:4px;margin:10px auto;font-size:15px}"
"input{background:#f1f1f1;border:0;padding:0 15px}body{background:#3498db;font-family:sans-serif;font-size:14px;color:#777}"
"#file-input{padding:0;border:1px solid #ddd;line-height:44px;text-align:left;display:block;cursor:pointer}"
"#bar,#prgbar{background-color:#f1f1f1;border-radius:10px}#bar{background-color:#3498db;width:0%;height:10px}"
"form{background:#fff;max-width:258px;margin:75px auto;padding:30px;border-radius:5px;text-align:center}"
".btn{background:#3498db;color:#fff;cursor:pointer}</style>";

/* Login page */
String loginIndex = 
"<form name=loginForm>"
"<h1>Update Program MY FARM</h1>"
"<input name=userid placeholder='Username'> "
"<input name=pwd placeholder=Password type=Password> "
"<input type=submit onclick=check(this.form) class=btn value=Login></form>"
"<script>"
"function check(form) {"
"if(form.userid.value=='admin' && form.pwd.value=='admin')"
"{window.open('/serverIndex')}"
"else"
"{alert('Error Password or Username')}"
"}"
"</script>" + style;
 
/* Server Index Page */
String serverIndex = 
"<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>"
"<form method='POST' action='#' enctype='multipart/form-data' id='upload_form'>"
"<input type='file' name='update' id='file' onchange='sub(this)' style=display:none>"
"<label id='file-input' for='file'>   Choose file...</label>"
"<input type='submit' class=btn value='Update'>"
"<br><br>"
"<div id='prg'></div>"
"<br><div id='prgbar'><div id='bar'></div></div><br></form>"
"<script>"
"function sub(obj){"
"var fileName = obj.value.split('\\\\');"
"document.getElementById('file-input').innerHTML = '   '+ fileName[fileName.length-1];"
"};"
"$('form').submit(function(e){"
"e.preventDefault();"
"var form = $('#upload_form')[0];"
"var data = new FormData(form);"
"$.ajax({"
"url: '/update',"
"type: 'POST',"
"data: data,"
"contentType: false,"
"processData:false,"
"xhr: function() {"
"var xhr = new window.XMLHttpRequest();"
"xhr.upload.addEventListener('progress', function(evt) {"
"if (evt.lengthComputable) {"
"var per = evt.loaded / evt.total;"
"$('#prg').html('progress: ' + Math.round(per*100) + '%');"
"$('#bar').css('width',Math.round(per*100) + '%');"
"}"
"}, false);"
"return xhr;"
"},"
"success:function(d, s) {"
"console.log('success!') "
"},"
"error: function (a, b, c) {"
"}"
"});"
"});"
"</script>" + style;

void setup() {
  Serial.begin(115200);
pinMode (pompapupuk, OUTPUT);
pinMode (pompavitaminikan, OUTPUT);
pinMode (pemanas, OUTPUT);
pinMode(TdsSensorPin,INPUT);
pinMode(PH_PIN_akuarium,INPUT);

pinMode(trigPinvitamin, OUTPUT); // Sets the trigPin as an Output
pinMode(echoPinvitamin, INPUT); // Sets the echoPin as an Input
pinMode(trigPinpupuk, OUTPUT); // Sets the trigPin as an Output
pinMode(echoPinpupuk, INPUT); // Sets the echoPin as an Input
pinMode(kipas, OUTPUT);
pinMode(pompa1, OUTPUT);
pinMode(pompa2, OUTPUT);
pinMode(uv1, OUTPUT);
pinMode(uv2, OUTPUT);

Wire.begin();
 lightMeter.begin();

dht.begin();
  EEPROM.begin(32);//needed to permit storage of calibration value in eeprom
  ph.begin();
  sensors.begin();
myservo.attach(26);
  
  WiFiManager wifiManager;
  wifiManager.autoConnect("MY FARM");
  Serial.println("Connected."); 
  server.begin();
 /*use mdns for host name resolution*/
  if (!MDNS.begin(host)) { http://192.168.8.128
    Serial.println("Error setting up MDNS responder!");
    while (1) {
      delay(1000);
    }
  }
  Serial.println("mDNS responder started");
  /*return index page which is stored in serverIndex */
  server.on("/", HTTP_GET, []() {
    server.sendHeader("Connection", "close");
    server.send(200, "text/html", loginIndex);
  });
  server.on("/serverIndex", HTTP_GET, []() {
    server.sendHeader("Connection", "close");
    server.send(200, "text/html", serverIndex);
  });
  /*handling uploading firmware file */
  server.on("/update", HTTP_POST, []() {
    server.sendHeader("Connection", "close");
    server.send(200, "text/plain", (Update.hasError()) ? "FAIL" : "OK");
    ESP.restart();
  }, []() {
    HTTPUpload& upload = server.upload();
    if (upload.status == UPLOAD_FILE_START) {
      Serial.printf("Update: %s\n", upload.filename.c_str());
      if (!Update.begin(UPDATE_SIZE_UNKNOWN)) { //start with max available size
        Update.printError(Serial);
      }
    } else if (upload.status == UPLOAD_FILE_WRITE) {
      /* flashing firmware to ESP*/
      if (Update.write(upload.buf, upload.currentSize) != upload.currentSize) {
        Update.printError(Serial);
      }
    } else if (upload.status == UPLOAD_FILE_END) {
      if (Update.end(true)) { //true to set the size to the current progress
        Serial.printf("Update Success: %u\nRebooting...\n", upload.totalSize);
      } else {
        Update.printError(Serial);
      }
    }
  });
  server.begin();
  delay(10);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
  Serial.setDebugOutput(true);
}

void loop() {
getschedule();
USE_SERIAL.print("[HTTP] Memulai...\n");

// suhu tanaman
  float suhu_tanaman = dht.readTemperature();
  Serial.print("Temperature: ");
  Serial.print(suhu_tanaman);
  Serial.println("°C ");
  if (suhu_tanaman >= 25) {
    digitalWrite (kipas, LOW);
    } else {
      digitalWrite (kipas, HIGH);
      }

//PH tanaman
   static unsigned long timepoint = millis();
  if (millis() - timepoint > 1000U) //time interval: 1s
  {
    timepoint = millis();
    //voltage = rawPinValue / esp32ADC * esp32Vin
    voltage = analogRead(PH_PIN_terarium) / ESPADC * ESPVOLTAGE; // read the voltage
    phValue_terarium = ph.readPH(voltage, temperature); // convert voltage to pH with temperature compensation
    hasilphterarium = phValue_terarium + 1.8;
    Serial.print("hasilphterarium:");
    Serial.println(hasilphterarium, 4);
  }
  ph.calibration(voltage, temperature); // calibration process by Serail CMD
 
//intensitas cahaya
digitalWrite (uv1, 255);
digitalWrite (uv2, 0);
  float a = lightMeter.readLightLevel();
  int intentitascahaya_tanaman = ((a/5)*100);
  Serial.print("Light: ");
  Serial.print(a);
  Serial.println(" lx");
  Serial.print(intentitascahaya_tanaman);
  Serial.println(" %");
  delay(1000);

// kelembapan tanaman
  float kelembapan_tanaman = dht.readHumidity();
  Serial.print("Humidity: ");
  Serial.print(kelembapan_tanaman);
  Serial.print("%");

// co2 tanaman + o2 tanaman
MQ135 gasSensor = MQ135(gasMQ135);
    float co2_tanaman = gasSensor.getPPM()/10;
    float o2_tanaman = gasSensor.getPPM();
    Serial.print("co2 tanaman: ");  
    Serial.print(co2_tanaman);
    Serial.println("  PPM");   
    Serial.println();
    Serial.print("o2 tanaman: ");  
    Serial.print(o2_tanaman);
    Serial.println("  PPM");   
    Serial.println();

//debit tanaman
int debit_tanaman = 0;
if (kelembapan_tanaman <= 10){
     analogWrite(pompa1, 100);
     analogWrite(pompa2, 0);
     debit_tanaman = 100;
  } else if (kelembapan_tanaman >= 10 && kelembapan_tanaman <= 20 ) {
     analogWrite(pompa1, 50);
     analogWrite(pompa2, 0);
     debit_tanaman = 50;
    }else {
     analogWrite(pompa1, 0);
     analogWrite(pompa2, 0);  
     debit_tanaman = 0;    
      }

// indikator pupuk
// Clears the trigPin
  digitalWrite(trigPinpupuk, LOW);
  delayMicroseconds(2);
  // Sets the trigPin on HIGH state for 10 micro seconds
  digitalWrite(trigPinpupuk, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPinpupuk, LOW);
  
  // Reads the echoPin, returns the sound wave travel time in microseconds
  durationpupuk = pulseIn(echoPinpupuk, HIGH);
  
  // Calculate the distance
  distanceCmpupuk = durationpupuk * SOUND_SPEED/2;

  
  // Prints the distance in the Serial Monitor
  Serial.print("Distance (cm): ");
  Serial.println(distanceCmpupuk);
  
  delay(500);
// suhu akuarium
  sensors.requestTemperatures(); 
  float temperatureC = sensors.getTempCByIndex(0);
  if (temperatureC > 24){
    digitalWrite (pemanas, LOW);// gak usah
    }else
    {
      digitalWrite (pemanas, HIGH);// gak usah
      } 
  Serial.print(temperatureC);
  Serial.println("ºC");

 // PH akuarium
static unsigned long timepoint2 = millis();
  if (millis() - timepoint2 > 1000U) //time interval: 1s
  {
    timepoint2 = millis();
    //voltage = rawPinValue / esp32ADC * esp32Vin
    voltage = analogRead(PH_PIN_akuarium) / ESPADC * ESPVOLTAGE; // read the voltage
    phValue_akuarium = ph.readPH(voltage, temperature); // convert voltage to pH with temperature compensation
    hasilphakuarium = phValue_akuarium - 8.5 ;
    Serial.print("hasilphakuarium:");
    Serial.println(hasilphakuarium, 4);
  }
  ph.calibration(voltage, temperature); // calibration process by Serail CMD

   // oksigen akuarium
   static unsigned long analogSampleTimepoint = millis();
   if(millis()-analogSampleTimepoint > 40U)     //every 40 milliseconds,read the analog value from the ADC
   {
     analogSampleTimepoint = millis();
     analogBuffer[analogBufferIndex] = analogRead(TdsSensorPin);    //read the analog value and store into the buffer
     analogBufferIndex++;
     if(analogBufferIndex == SCOUNT) 
         analogBufferIndex = 0;
   }   
   static unsigned long printTimepoint = millis();
   if(millis()-printTimepoint > 800U)
   {
      printTimepoint = millis();
      for(copyIndex=0;copyIndex<SCOUNT;copyIndex++)
        analogBufferTemp[copyIndex]= analogBuffer[copyIndex];
      averageVoltage = getMedianNum(analogBufferTemp,SCOUNT) * (float)VREF / 4095.0; // read the analog value more stable by the median filtering algorithm, and convert to voltage value
      float compensationCoefficient=1.0+0.02*(temperature3-25.0);    //temperature compensation formula: fFinalResult(25^C) = fFinalResult(current)/(1.0+0.02*(fTP-25.0));
      float compensationVolatge=averageVoltage/compensationCoefficient;  //temperature compensation
      tdsValue=(133.42*compensationVolatge*compensationVolatge*compensationVolatge - 255.86*compensationVolatge*compensationVolatge + 857.39*compensationVolatge)*0.5; //convert voltage value to tds value
      Serial.print("TDS Value:");
      Serial.print(tdsValue,0);
      Serial.println("ppm");
   }  

// indikator vitamin akuarium
 {
  // Clears the trigPin
  digitalWrite(trigPinvitamin, LOW);
  delayMicroseconds(2);
  // Sets the trigPin on HIGH state for 10 micro seconds
  digitalWrite(trigPinvitamin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPinvitamin, LOW);
  
  // Reads the echoPin, returns the sound wave travel time in microseconds
  durationvitamin = pulseIn(echoPinvitamin, HIGH);
  
  // Calculate the distance
  distanceCmvitamin = durationvitamin * SOUND_SPEED/2;

  
  // Prints the distance in the Serial Monitor
  Serial.print("Distance (cm): ");
  Serial.println(distanceCmvitamin);
  
  delay(500);
}
                
  
if(WiFi.status()== WL_CONNECTED){
    WiFiClient client;
    HTTPClient http;
    
    http.begin(client, serverName);
    
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    
    String httpRequestData = "api_key=" + apiKeyValue + "&id_user=" +(String) 39 + "&suhu_tanaman=" +(String) suhu_tanaman + "&PH_tanaman=" + (String) hasilphterarium + "&intentitascahaya_tanaman=" + (String) intentitascahaya_tanaman + "%" + "&intentitascahaya_tanaman2=" + (String) intentitascahaya_tanaman + "&kelembapan_tanaman=" + (String) kelembapan_tanaman + "%" + "&kelembapan_tanaman2=" + (String) kelembapan_tanaman + "&co2_tanaman=" + (String) co2_tanaman + "&o2_tanaman=" + (String) o2_tanaman + "&debit_tanaman=" + (String) debit_tanaman + "&mineral_tanaman=" + (String) debit_tanaman + "%" + "&mineral_tanaman2=" + (String) debit_tanaman + "&indikatornutrisi_tanaman=" + (String) distanceCmpupuk + "&PH_akuarium=" + (String) hasilphakuarium + "&suhu_akuarium=" + (String) temperatureC + "&oksigen_akuarium=" + (String) tdsValue + "&amoniak_akuarium=" + (String) tdsValue + "&indikatorpakan_akuarium=" + (String) 80 + "&indikatorvitamin_akuarium=" + (String) distanceCmvitamin + "&HWID=" + HWID + "";
    Serial.print("httpRequestData: ");
    Serial.println(httpRequestData);
    
    int httpResponseCode = http.POST(httpRequestData);
     
    if (httpResponseCode>0) {
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
    }
    else {
      Serial.print("Error code: ");
      Serial.println(httpResponseCode);
    }
    http.end();
  }
  else {
    Serial.println("WiFi Disconnected");
  }
  delay(30000);
  
  server.handleClient();
}

  void getschedule(){
sensorReadings_getschedule = httpGETRequest_getschedule (serverName_getschedule);
JSONVar myObject_getschedule = JSON.parse(sensorReadings_getschedule);

if (JSON.typeof(myObject_getschedule) == "undefined") {
  Serial.println("Parsing input failed!");
  return;
}

JSONVar keys = myObject_getschedule.keys();

for (int i = 0; i < keys.length(); i++) {
  JSONVar value = myObject_getschedule [keys[i]];
  sensorReadingsArr_getschedule [i] = double(value);
}
Serial.print("jadwal_pupuk = ");
Serial.println(sensorReadingsArr_getschedule [0]);
if(sensorReadingsArr_getschedule [0] == 1.00){digitalWrite (pompapupuk, LOW);}
else{digitalWrite (pompapupuk, HIGH);}
Serial.print("waktu_vitamin_ikan = ");
Serial.println(sensorReadingsArr_getschedule [1]);
if(sensorReadingsArr_getschedule [1] == 1.00){digitalWrite (pompavitaminikan, LOW);}
else{digitalWrite (pompavitaminikan, HIGH);}
Serial.print("waktu_pakan_ikan = ");
Serial.println(sensorReadingsArr_getschedule [2]);
if(sensorReadingsArr_getschedule [2] == 1.00){
 for(pos = 00; pos < 180; pos += 1)  //fungsi perulangan yang akan dijadikan PWM dengan kenaikan 1
 {
  myservo.write(pos); //prosedur penulisan data PWM ke motor servo
  delay(15); //waktu tunda 15 ms                 
 } 
 for(pos = 180; pos>=1; pos-=1)  //fungsi perulangan yang akan dijadikan PWM dengan penurunan 1
 {                              
  myservo.write(pos);                 
  delay(15);                        
 }
}
  }

String httpGETRequest_getschedule (const char* serverName_getschedule) {
  HTTPClient http;

  http.begin(serverName_getschedule);

  int httpResponseCode = http.GET();

  String payload = "{}"; 

  if (httpResponseCode>0) {
    Serial.print("HTTP Response code: ");
    Serial.println(httpResponseCode);
    payload = http.getString();
  }
  else {
    Serial.print("Error code: ");
    Serial.println(httpResponseCode);
  }
  http.end();
  return payload;
}


int getMedianNum(int bArray[], int iFilterLen) 
{
      int bTab[iFilterLen];
      for (byte i = 0; i<iFilterLen; i++)
      bTab[i] = bArray[i];
      int i, j, bTemp;
      for (j = 0; j < iFilterLen - 1; j++) 
      {
      for (i = 0; i < iFilterLen - j - 1; i++) 
          {
        if (bTab[i] > bTab[i + 1]) 
            {
        bTemp = bTab[i];
            bTab[i] = bTab[i + 1];
        bTab[i + 1] = bTemp;
         }
      }
      }
      if ((iFilterLen & 1) > 0)
    bTemp = bTab[(iFilterLen - 1) / 2];
      else
    bTemp = (bTab[iFilterLen / 2] + bTab[iFilterLen / 2 - 1]) / 2;
      return bTemp;
}
