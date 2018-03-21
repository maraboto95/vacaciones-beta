<?php

//Código para editar la información de un empleado.
include('dbconnect.php');

$id = $_GET['id'];

$nombre = $_GET['nombre'];

$apellido = $_GET['apellido'];

$puesto = $_GET['puesto'];

$turno = $_GET['turno'];

$nomina = $_GET['nomina'];

$jefe = $_GET['jefe'];

$query = "UPDATE empleados SET nombre='$nombre', apellido='$apellido', puesto='$puesto', turno='$turno', nomina='$nomina', jefe='$jefe' WHERE id='$id'";

if(mysqli_query($conn, $query)){
	echo "Updated";
	header('Location: ver-empleados.php');
}else{
	echo "Error";
}

mysqli_close($conn);

?>