# Carpoort_Alarm
Carpoort alarm Build with Siemens Logo8.FS4
LWE, Logo-Web-Editor Project, makes use of the internal Logo Webserver to use your mobile or any browser to control the application.

Logo Soft Comfort V8.2.1
LWE V1.0.1

SMS alerts via Java code on Raspberry-Pi4
Connection between Logo and Rb via a potential free relais contact.

General Purpose Input Output, GPIO, pins are used on the Rb.

On alarm detection an HTTP GET request is send to an PHP file, that will update a Mysql database Table.
This table is scanned by another java application, that controls an Fasttrac Gsm modem. 
This application will send the sms to the configured destinator.

Available for Download are 
- Schematics Siemens Logo circuits / CarpoortAlarm_Schemas.pdf
- Siemens Logo / Carpoort-Alarm-V1-8.mnp
- Siemens LWE / LWE_Carpoort_Alarm_V3.7z
- Java Application the scans the Alarm contact / Carpoort_Alarm.7z
- Java Application that controls fastrac Gsm modem / RS232.7z
- php file called via Http/get in Carpoort_Alarm.7z / From_Rb-Pi4-Carpoort-Alarm-Github.php
