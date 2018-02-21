<?php

include('dbconnect.php');

$id = $_GET['id'];

$nombre = $_GET['nombre'];

$apellido = $_GET['apellido'];

$puesto = $_GET['puesto'];

$turno = $_GET['turno'];

$nomina = $_GET['nomina'];

$jefe = $_GET['jefe'];

$fechaantiguedad = $_GET['fechaantiguedad'];

$query = "UPDATE empleados SET nombre='$nombre', apellido='$apellido', puesto='$puesto', turno='$turno', nomina='$nomina', jefe='$jefe', fechadeantiguedad='$fechaantiguedad' WHERE id='$id'";

if(mysqli_query($conn, $query)){
	echo "Updated";
	header('Location: index.php');
}else{
	echo "Error";
}

mysqli_close($conn);

?>