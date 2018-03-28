<?php

//Código para editar la información de un empleado.
include('dbconnect.php');

$id = $_GET['id'];

$titulo = $_GET['titulo'];

$noticia = $_GET['noticia'];

$query = "UPDATE noticias SET titulo='$titulo', noticia='$noticia' WHERE id='$id'";

if(mysqli_query($conn, $query)){
	echo "Updated";
	header('Location: ver-noticias-admin.php');
}else{
	echo "Error";
}

mysqli_close($conn);

?>