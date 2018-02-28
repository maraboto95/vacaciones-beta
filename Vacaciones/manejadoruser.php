<?php

//Código para verificar inicio de sesión de un empleado.
include('dbconnect.php');

$nombre = $_POST['usuario'];

$apellido = $_POST['password'];

//Query

$query = "SELECT * FROM empleados WHERE nombre='$nombre' and apellido='$apellido'";

$result=mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){
	session_start();
	$_SESSION['username'] = $nombre;
	$_SESSION['privilegio'] = 0;
	header('Location: homeuser.php');
}else{
	header('Location: loginuser.php');
}

mysqli_close($conn);

?>