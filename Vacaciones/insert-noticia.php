<?php

//Código que Agrega a un empleado a la BD.

//Conexión

include('dbconnect.php');

date_default_timezone_set("America/Chicago");

$date = date("Y/m/d");

$titulo = $_POST['titulo'];

$noticia = $_POST['noticia'];

$tipo = $_POST['tipo'];

$empleado = $_POST['empleado'];

//Query

$query = "INSERT INTO noticias(titulo, noticia, fecha, tipo, empleado) VALUES('$titulo', '$noticia', '$date', '$tipo', '$empleado')";

if(mysqli_query($conn, $query)){
	echo "Insert exitoso";
}else{
	echo "Error";
}

mysqli_close($conn);

header('Location: index.php');

?>