<?php

//Código para verificar inicio de sesión de un administrador.

include('dbconnect.php');

$nombre = $_POST['usuario'];

$apellido = $_POST['password'];

//Query

$query = "SELECT * FROM administradores WHERE nombre='$nombre' and apellido='$apellido'";

$result=mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){
	session_start();
	$_SESSION['username'] = $nombre;
	$_SESSION['privilegio'] = 1;
	header('Location: index.php');
}else{
	header('Location: login.php');
}

mysqli_close($conn);

?>