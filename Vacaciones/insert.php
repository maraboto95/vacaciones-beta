<?php

//Código que Agrega a un empleado a la BD.

//Conexión

include('dbconnect.php');

$nombre = $_POST['nombre'];

$apellido = $_POST['apellido'];

$puesto = $_POST['puesto'];

$turno = $_POST['turno'];

$nomina = $_POST['nomina'];

$jefe = $_POST['jefe'];

$fechaantiguedad = =$_POST['fechaantiguedad'];

//Query

$query = "INSERT INTO empleados(nombre, apellido, puesto, turno, nomina, jefe, fechadeantiguedad) VALUES('$nombre', '$apellido', '$puesto', '$turno', '$nomina', '$jefe', $fechaantiguedad)";

if(mysqli_query($conn, $query)){
	echo "Insert exitoso";
}else{
	echo "Error";
}

mysqli_close($conn);

header('Location: index.php');

?>