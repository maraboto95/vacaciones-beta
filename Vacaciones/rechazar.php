<?php

//Código para rechazar una solicitud de vacaciones.
include('dbconnect.php');

$id = $_GET['id'];

$query = "UPDATE permisos SET estatus='rechazado' WHERE id='$id'";

if(mysqli_query($conn, $query)){
	echo "Updated";
	header('Location: checar-permisos.php');
}else{
	echo "Error";
}

mysqli_close($conn);

?>