<?php
session_start(); // start session

// do check
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit; // prevent further execution, should there be more code that follows
}

//Si el usuario no cuenta con los permisos suficientes, redirecciona a login.
if($_SESSION['privilegio'] < 1){
	header("Location: index.html");
    exit; // prevent further execution, should there be more code that follows
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vacaciones Beta</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<?php

	//Se consigue el id del empleado al que se va a editar.
	$id = $_GET['id'];

	include('dbconnect.php');

	$query = "SELECT * FROM empleados WHERE id=$id";

	$result = mysqli_query($conn, $query);
	?>

	<!-- COMIENZO DE LA FORMA -->
	<div class="container bg-info" style="padding-top:20px; padding-bottom:20px;">
		<h3>Edición de empleado</h3>
		<form role="form" action="edit.php" method="get">
			<?php

			while($row=mysqli_fetch_assoc($result)){
			?>
			<input type="hidden" name="id" value="<?php echo $row['id']?>">
			<div class="form-group">
				<label>Nombre</label>
				<input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre']?>">
			</div>
			<div class="form-group">
				<label>Apellido</label>
				<input type="text" name="apellido" class="form-control" value="<?php echo $row['apellido']?>">
			</div>
			<div class="form-group">
				<label>Puesto</label>
				<input type="text" name="puesto" class="form-control" value="<?php echo $row['puesto']?>">
			</div>
			<div class="form-group">
				<label>Turno</label>
				<input type="text" name="turno" class="form-control" value="<?php echo $row['turno']?>">
			</div>
			<div class="form-group">
				<label>Nómina</label>
				<input type="text" name="nomina" class="form-control" value="<?php echo $row['nomina']?>">
			</div>
			<div class="form-group">
				<label>Jefe</label>
				<input type="text" name="jefe" class="form-control" value="<?php echo $row['jefe']?>">
			</div>
			<div class="form-group">
				<label>Fecha de Antigüedad</label>
				<input type="date" name="fechaantiguedad" class="form-control" value="<?php echo $row['fechadeantiguedad']?>">
			</div>
			<button type="submit" class="btn bg-success btn-block">Editar</button>
			<!-- FIN DE LA FORMA -->
			<?php

			//Cerrar conexión a la BD.

		}

		mysqli_close($conn);
			?>
		</form>
	</div>
</body>
</html>