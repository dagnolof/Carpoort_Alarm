<?php
// Loop through and grab variables off the URL
foreach ($_REQUEST as $key => $value) {
    if ($key == 'UnitId') {
        $UnitId = $value;
    }
    
    if ($key == 'SensorId') {
        $SensorId = $value;
    }

    if ($key == 'State') {
        $SensorState = $value;
    }
    
 //   if ($key == 'Comment') {
 //       $SensorComment = $value;
 //   }
}  //foreach
 
// echo 'UnitId:      '.$UnitId. '<br>';
// echo 'SensorId:    '.$SensorId. '<br>';
//echo 'Sensorstate: '.$SensorState. '<br>';
//echo 'Sensorcomment: '.$SensorComment. '<br>';   // ***** Space characters in comment must be replaced with %20 by the originator of the string

$Date = date("Y-m-d");
$Time = Date("H:i:s");

//echo 'Date: '.$Date .'<br>';
//echo 'Time: '.$Time .'<br>';

//Create connection to SQL database
$dbconnect = new mysqli ('localhost:3306' ,'Userid', 'Password', 'Database');

// Check connection
if($dbconnect->connect_errno > 0){
    echo 'Database Connection Failed';
    die('Unable to connect to database [' . $dbconnect->connect_error . ']');
}

$sql = "INSERT INTO t_sensor_values (d_unit_id, d_sensor_id, d_date, d_time, d_value)"
        . "VALUES ('$UnitId', '$SensorId', '$Date', '$Time', '$SensorState')";

if($dbconnect->query($sql)){
    echo 'sql insert into t_sensor_values OK  ';
} else{
    echo 'sql insert into t_sensor_values NOK  ';
}

// Find the Gsm number for this sensor
// It is not the task of this php procedure to find all related data for the sensor. 
// This action should be done by the Java program. He knows d_unit_id and d_sensor_id
// if SensorState = 1, we should Store an Action in t_todo_sensors
if ($SensorState == 1){ 
  $sql = "INSERT INTO t_todo_sensors (d_unit_id, d_sensor_id, d_date, d_time, d_done)"
          . "VALUES ('$UnitId', '$SensorId', '$Date', '$Time', '0')";

  if($dbconnect->query($sql)){
    echo 'sql insert into t_todo_sensors OK';
  } else{
    echo 'sql insert into t_todo_sensors NOK';
  }
}

$dbconnect->close();

?>