<?php

include('dbconnect.php');

$nombre = $_POST['usuario'];

$apellido = $_POST['password'];

//Query

$query = "SELECT * FROM empleados WHERE nombre='$nombre' and apellido='$apellido'";

$result=mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){
	session_start();
	$_SESSION['username'] = $nombre;
	header('Location: index.php');
}else{
	header('Location: login.php');
}

mysqli_close($conn);

?>