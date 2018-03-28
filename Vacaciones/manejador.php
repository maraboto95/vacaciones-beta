<?php

session_start();

//Código para verificar inicio de sesión de un administrador.

include('dbconnect.php');

$correo = $_POST['usuario'];

$contra = $_POST['password'];

//Query

$query = "SELECT * FROM administradores WHERE correo='$correo' and contrasena='$contra'";

$result=mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){
	session_start();
	$_SESSION['username'] = $correo;
	$_SESSION['privilegio'] = 1;
	header('Location: index.php');
}else{
	$query = "SELECT * FROM empleados WHERE correo='$correo' and contrasena='$contra'";

$result2=mysqli_query($conn, $query);

if(mysqli_num_rows($result2) > 0){
	session_start();
	$_SESSION['username'] = $correo;
	$_SESSION['privilegio'] = 0;
	header('Location: homeuser.php');
}else{
	$_SESSION['attempt'] = 1;
	header('Location: login.php');
}
}

mysqli_close($conn);

?>