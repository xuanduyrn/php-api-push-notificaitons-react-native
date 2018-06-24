<?php
  $host = "localhost";
  $db_user = "root";
  $db_password = "";
  $db_name = "fcm_db";
  $con = mysqli_connect($host, $db_user,$db_password,$db_name);
  $json = file_get_contents('php://input');
  $obj = json_decode($json,true);
  $token = $obj['token'];
  $tokenAndroid = $obj['tokenAndroid'];
  $tokenIOS = $obj['tokenIOS'];
  $userName = $obj['userName'];
  $DateTime = $obj['DateTime'];
  $Sql_Query = "insert into fcm_info (token, tokenAndroid, tokenIOS, userName, DateTime) values ('$token', '$tokenAndroid', '$tokenIOS', '$userName', '$DateTime')";

  if(mysqli_query($con,$Sql_Query)){
    $MSG = 'Record Successfully Inserted Into MySQL Database.' ;
    $json = json_encode($MSG);
     echo $json ;
     }
     else{
     echo 'Try Again';
     }
     mysqli_close($con);
?>
