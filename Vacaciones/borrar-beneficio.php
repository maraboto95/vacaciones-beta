<?php

//Código para borrar a un empleado

$id = $_GET['id'];

include('dbconnect.php');

$query = "DELETE FROM convenios WHERE imagen='$id'";

if(mysqli_query($conn, $query)){
	echo "Borrado";
	header('Location: ver-beneficios-admin.php');
}else{
	echo "Error";
}

mysqli_close($conn);

?>