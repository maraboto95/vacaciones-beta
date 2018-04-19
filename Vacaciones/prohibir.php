<?php


//Código que Agrega a un empleado a la BD.

//Conexión

include('dbconnect.php');

$fecha = $_POST['fechaprohibida'];

//Query

$query = "INSERT INTO fechasprohibidas(fechas) VALUES('$fecha')";

if(mysqli_query($conn, $query)){
	echo "Insert exitoso";
}else{
	echo "Error";
}

mysqli_close($conn);

header('Location: prohibir-fecha.php');

?>