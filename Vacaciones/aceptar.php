<?php
//Código para aceptar una solicitud de vacaciones.


//Conexión a la BD
include('dbconnect.php');

//Declaración de variables
$id = $_GET['id'];

$query = "SELECT * FROM permisos WHERE id='$id'";

$posible = false;

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$nodias1 = $row['nodediassueldo'];

$nodias2 = $row['nodediassueldo2'];

$nodias3 = $row['nodediasnosueldo'];

$nodias4 = $row['nodediasnosueldo2'];

$nodias5 = $row['nodediasvacaciones'];

$nodias6 = $row['nodediasvacaciones2'];

$nombre = $row['nombredesolicitante'];

$horade = $row['horariodehoras'];

$horaa = $row['horarioahoras'];

//Crear Query de los días del empleado
$query = "SELECT horasdisponibles FROM empleados WHERE nombre='$nombre'";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$diasdisponibles = $row['diasdisponibles'];

//Verificación de que el empleado cuenta con días suficientes
$resta = $diasdisponibles - $nodias1;

if($resta>=0 && $posible == false){
	$posible = true;
	$query = "UPDATE empleados SET diasdisponibles='$resta' WHERE nombre='$nombre'";

	mysqli_query($conn, $query);
}

$resta = $diasdisponibles - $nodias2;

if($resta>=0 && $posible == false){
	$posible = true;
	$query = "UPDATE empleados SET diasdisponibles='$resta' WHERE nombre='$nombre'";

	mysqli_query($conn, $query);
}

$resta = $diasdisponibles - $nodias3;

if($resta>=0 && $posible == false){
	$posible = true;
	$query = "UPDATE empleados SET diasdisponibles='$resta' WHERE nombre='$nombre'";

	mysqli_query($conn, $query);
}

$resta = $diasdisponibles - $nodias4;

if($resta>=0 && $posible == false){
	$posible = true;
	$query = "UPDATE empleados SET diasdisponibles='$resta' WHERE nombre='$nombre'";

	mysqli_query($conn, $query);
}

$resta = $diasdisponibles - $nodias5;

if($resta>=0 && $posible == false){
	$posible = true;
	$query = "UPDATE empleados SET vacacionesdisponibles='$resta' WHERE nombre='$nombre'";

	mysqli_query($conn, $query);
}

$resta = $diasdisponibles - $nodias6;

if($resta>=0 && $posible == false){
	$posible = true;
	$query = "UPDATE empleados SET vacacionesdisponibles='$resta' WHERE nombre='$nombre'";

	mysqli_query($conn, $query);
}

//Sí contó con días disponibles, se hace acepta la solicitud, si no, no se hace nada.
if($posible == true){
	$query = "UPDATE permisos SET estatus='aceptado' WHERE id='$id'";

	if(mysqli_query($conn, $query)){
		echo "Updated";
	}else{
		echo "Error";
	}

	header('Location: checar-permisos.php');
}else{
	echo "El empleado no tiene más horas disponibles, por lo tanto no se puede aceptar";
}

mysqli_close($conn);


?>