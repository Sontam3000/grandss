<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "Grands";

//Connection
 $conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

//check connection
if(!$conn){
	die("Connection Failed");
}
//else{  echo "connected";  }


?>