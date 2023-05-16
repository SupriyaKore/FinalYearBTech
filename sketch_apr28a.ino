#include <SPI.h>
#include <MFRC522.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
//-----------------------------------------
constexpr uint8_t RST_PIN = D3;
constexpr uint8_t SS_PIN = D4;
//-----------------------------------------
MFRC522 mfrc522(SS_PIN, RST_PIN);
MFRC522::MIFARE_Key key;        
//-----------------------------------------
/* Set the block to write data */
const char* ssid = "Vaishnavi";
const char* password = "Vvb@0910";
int blockNum = 2;  
/* This is the actual data which is 
going to be written into the card */
byte blockData [16] = {"Ahmad_Logs"};
//-----------------------------------------
/* Create array to read data from Block */
/* Length of buffer should be 2 Bytes 
more than the size of Block (16 Bytes) */
byte bufferLen = 18;
byte readBlockData[18];
//-----------------------------------------
MFRC522::StatusCode status;
//-----------------------------------------
HTTPClient http; //--> Declare object of class HTTPClient
WiFiClient client;

#define ON_Board_LED 2

void setup() 
{
  //-----------------------------------------
  //Initialize serial communications with PC
  Serial.begin(9600);
  //-----------------------------------------
  //Initialize SPI bus
  SPI.begin();
  //-----------------------------------------
  //Initialize MFRC522 Module
  mfrc522.PCD_Init();
  Serial.println("Scan a MIFARE 1K Tag to write data...");
  //-----------------------------------------
    WiFi.begin(ssid, password); //--> Connect to your WiFi router
  Serial.println("");
    
  pinMode(ON_Board_LED,OUTPUT); 
  digitalWrite(ON_Board_LED, HIGH); //--> Turn off Led On Board

  //----------------------------------------Wait for connection
  Serial.print("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    //----------------------------------------Make the On Board Flashing LED on the process of connecting to the wifi router.
    digitalWrite(ON_Board_LED, LOW);
    delay(250);
    digitalWrite(ON_Board_LED, HIGH);
    delay(250);
}
digitalWrite(ON_Board_LED, HIGH);

  Serial.println("");
  Serial.print("Successfully connected to : ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
}

/**********************************
 * Writ() function
 **********************************/
void loop()
{
  //------------------------------------------------------------------------------
  /* Prepare the ksy for authentication */
  /* All keys are set to FFFFFFFFFFFFh at chip delivery from the factory */
  for (byte i = 0; i < 6; i++){
    key.keyByte[i] = 0xFF;
  }
  //------------------------------------------------------------------------------
  /* Look for new cards */
  /* Reset the loop if no new card is present on RC522 Reader */
  if ( ! mfrc522.PICC_IsNewCardPresent()){return;}
  //------------------------------------------------------------------------------
  /* Select one of the cards */
  if ( ! mfrc522.PICC_ReadCardSerial()) {return;}
  //------------------------------------------------------------------------------
  Serial.print("\n");
  Serial.println("*Card Detected*");
  String content= "";
  /* Print UID of the Card */
  Serial.print(F("Card UID:"));
  for (byte i = 0; i < mfrc522.uid.size; i++){
    Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
    Serial.print(mfrc522.uid.uidByte[i], HEX);
    content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " "));
    content.concat(String(mfrc522.uid.uidByte[i], HEX));
  }
  Serial.println();
  content.toUpperCase();
  digitalWrite(ON_Board_LED, LOW);
    String UIDresultSend, postData;
    UIDresultSend = content;
   
    //Post Data
    postData = "UIDresult=" + UIDresultSend;

    // Your_Host_or_IP = Your pc or server IP, example : 192.168.0.0 , if you are a windows os user, open cmd, then type ipconfig then look at IPv4 Address.
    http.begin(client, "http://192.168.220.56/FinalNodeMCU/NodeMCU_RC522_Mysql/getUID.php");  //Specify request destination
    http.addHeader("Content-Type", "application/x-www-form-urlencoded"); //Specify content-type header
   
    int httpCode = http.POST(postData);   //Send the request
    String payload = http.getString();    //Get the response payload
  
    Serial.println(UIDresultSend);
    Serial.print("http : ");
    Serial.println(httpCode);   //Print HTTP return code
    Serial.print("pay : ");
    Serial.println(payload);    //Print request response payload
    
    http.end();  //Close connection
    delay(1000);
  digitalWrite(ON_Board_LED, HIGH);
  Serial.print("\n");
  delay(500);
}