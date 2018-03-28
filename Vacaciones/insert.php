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

$estadocivil = $_POST['estadocivil'];

$fechaantiguedad = $_POST['fechaantiguedad'];

$titulacion = $_POST['titulado'];

if($estadocivil == "casado"){
	$estadocivil = "usado";
}else{
	$estadocivil = "disponible";
}

if($titulacion == "titulado"){
	$titulacion = "usado";
}else{
	$titulacion = "disponible";
}

echo $fechaantiguedad;
echo $estadocivil;
echo $titulacion;

//Query

$query = "INSERT INTO empleados(nombre, apellido, puesto, turno, nomina, jefe, fechadeantiguedad, titulacion, matrimonio) VALUES('$nombre', '$apellido', '$puesto', '$turno', '$nomina', '$jefe', '$fechaantiguedad', '$titulacion', '$estadocivil')";

if(mysqli_query($conn, $query)){
	echo "Insert exitoso";
}else{
	echo "Error";
}

mysqli_close($conn);

header('Location: ver-empleados.php');

?>