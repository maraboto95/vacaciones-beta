<?php

$host = "localhost";

$user = "root";

$password = "";

$dbname = "vacaciones";

$conn = mysqli_connect($host, $user, $password, $dbname);

if(!$conn){
	die("error in connection");
}

//echo "connected create successfully!";

?>