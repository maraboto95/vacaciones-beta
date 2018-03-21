<?php

//Código para borrar a un empleado

$id = $_GET['id'];

include('dbconnect.php');

$query = "DELETE FROM empleados WHERE id='$id'";

if(mysqli_query($conn, $query)){
	echo "Borrado";
	header('Location: ver-empleados.php');
}else{
	echo "Error";
}

mysqli_close($conn);

?>