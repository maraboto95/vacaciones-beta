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

$nodias3 = $row['nodediasnosueldo'];

$nodias4 = $row['nodediasnosueldo2'];

$nodias5 = $row['nodediasvacaciones'];

$nodias6 = $row['nodediasvacaciones2'];

$nombre = $row['nombredesolicitante'];

$horade = $row['horariodehoras'];

$horaa = $row['horarioahoras'];

$razon = $row['razondepermiso'];

//Crear Query de los días del empleado
$query = "SELECT * FROM empleados WHERE correo='$nombre'";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$diasdisponibles = $row['diasdisponibles'];

$horasdisponibles = $row['horasdisponibles'];

$vacacionesdisponibles = $row['vacacionesdisponibles'];

$titulacion = $row['titulacion'];

$matrimonio = $row['matrimonio'];

//Verificación de que el empleado cuenta con días suficientes

$resta = $diasdisponibles - $nodias3;

if($resta>=0 && $posible == false && $nodias3 > 0){
	$posible = true;
	$query = "UPDATE empleados SET diasdisponibles='$resta' WHERE correo='$nombre'";

	mysqli_query($conn, $query);
}

$resta = $diasdisponibles - $nodias4;

if($resta>=0 && $posible == false && $nodias4 > 0){
	$posible = true;
	$query = "UPDATE empleados SET diasdisponibles='$resta' WHERE correo='$nombre'";

	mysqli_query($conn, $query);
}

$resta = $vacacionesdisponibles - $nodias5;

if($resta>=0 && $posible == false && $nodias5 > 0){
	$posible = true;
	$query = "UPDATE empleados SET vacacionesdisponibles='$resta' WHERE correo='$nombre'";

	mysqli_query($conn, $query);
}

$resta = $vacacionesdisponibles - $nodias6;

if($resta>=0 && $posible == false && $nodias6 > 0){
	$posible = true;
	$query = "UPDATE empleados SET vacacionesdisponibles='$resta' WHERE correo='$nombre'";

	mysqli_query($conn, $query);
}

if($razon == "titulacion" && $titulacion == "disponible"){
	$titulacion = "usado";
	$posible = true;
}else{
	if($razon == "titulacion"){
		$posible = false;
	}else{
		if($razon == "matrimonio" && $matrimonio == "disponible"){
			$matrimonio = "usado";
			$posible = true;
		}else{
			if($razon == "matrimonio"){
				$posible = false;
			}
		}
	}
}
$hour = new DateTime($horade);
$hour2 = new DateTime($horaa);
$restahoras = date_diff($hour2, $hour);
$horastring = $restahoras->format('%h');
$horaint = (int)$horastring;

$restahoras = $horasdisponibles - $horaint;

if($restahoras>=0 && $posible == false && $horaint > 0){
	$posible = true;
	$query = "UPDATE empleados SET horasdisponibles='$restahoras' WHERE correo='$nombre'";

	mysqli_query($conn, $query);
}

$query = "UPDATE empleados SET titulacion='$titulacion', matrimonio='$matrimonio' WHERE correo='$nombre'";

if(mysqli_query($conn, $query)){
		echo "Updated";
	}else{
		echo "Error";
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