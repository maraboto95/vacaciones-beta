<?php

session_start(); // start session

// do check
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit; // prevent further execution, should there be more code that follows
}
//Código que envía la solicitud de permiso a la BD.

//Conexión

include('dbconnect.php');

//Declaración de variables.

$nombre = $_SESSION["username"];

$fechadeantiguedad = $_POST['fechadeantiguedad'];

$nodias1 = $_POST['nodias1'];

$nodias2 = $_POST['nodias2'];

$nodias3 = $_POST['nodias3'];

$nodias4 = $_POST['nodias4'];

$nodias5 = $_POST['nodias5'];

$nodias6 = $_POST['nodias6'];

$del1 = $_POST['del1'];

$del2 = $_POST['del2'];

$del3 = $_POST['del3'];

$del4 = $_POST['del4'];

$del5 = $_POST['del5'];

$del6 = $_POST['del6'];

$al1 = $_POST['al1'];

$al2 = $_POST['al2'];

$al3 = $_POST['al3'];

$al4 = $_POST['al4'];

$al5 = $_POST['al5'];

$al6 = $_POST['al6'];

$opcion1 = $_POST['opcion1'];

$motivo1 = $_POST['motivo1'];

$motivo2 = $_POST['motivo2'];

$fecha = $_POST['fecha'];

$horariode = $_POST['horariode'];

$horarioa = $_POST['horarioa'];

//Query

$query = "INSERT INTO `permisos` (`id`, `nombredesolicitante`, `fechadeantiguedad`, `nodediassueldo`, `nodediassueldo2`, `nodediasnosueldo`, `nodediasnosueldo2`, `nodediasvacaciones`, `nodediasvacaciones2`, `delsueldo`, `delsueldo2`, `delnosueldo`, `delnosueldo2`, `delvacaciones`, `delvacaciones2`, `alsueldo`, `alsueldo2`, `alnosueldo`, `alnosueldo2`, `alvacaciones`, `alvacaciones2`, `razondepermiso`, `motivosinsueldo`, `motivohoras`, `fechahoras`, `horariodehoras`, `horarioahoras`, `estatus`) VALUES (NULL, '$nombre', '$fechadeantiguedad', '$nodias1', '$nodias2', '$nodias3', '$nodias4', '$nodias5', '$nodias6', '$del1', '$del2', '$del3', '$del4', '$del5', '$del6', '$al1', '$al2', '$al3', '$al4', '$al5', '$al6', '$opcion1', '$motivo1', '$motivo2', '$fecha', '$horariode', '$horarioa', 'pendiente');";

if($result = mysqli_query($conn, $query)){
	echo "Insert exitoso";
}else{
	echo "Error ";
	echo $result;
}

mysqli_close($conn);

header('Location: permisos.php');

?>