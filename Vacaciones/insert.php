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

$practicante = $_POST['practicante'];

$diasdisponibles = 5;

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

if($practicante == "practicante"){
	$practicante = "Sí";
}else{
	$practicante = "No";
}

$info = $_FILES['userFile']['name'];
$ext = $info['extension']; // get the extension of the file
$newname = $nomina.".jpg"; 

$target = 'imagenes/empleados/'.$newname;
move_uploaded_file( $_FILES['userFile']['tmp_name'], $target);

//Query

$query = "INSERT INTO empleados(nombre, apellido, puesto, turno, nomina, jefe, fechadeantiguedad, diasdisponibles, titulacion, matrimonio, practicante, imagen) VALUES('$nombre', '$apellido', '$puesto', '$turno', '$nomina', '$jefe', '$fechaantiguedad', '$diasdisponibles', '$titulacion', '$estadocivil', '$practicante', '$newname')";

if(mysqli_query($conn, $query)){
	echo "Insert exitoso";
}else{
	echo "Error";
}

mysqli_close($conn);

header('Location: ver-empleados.php');

?>