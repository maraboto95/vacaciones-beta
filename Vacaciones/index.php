<?php
session_start(); // start session

// do check
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit; // prevent further execution, should there be more code that follows
}

//Checa si el usuario cuenta con los permisos suficientes para acceder, si no, lo regresa a login.
if($_SESSION['privilegio'] < 1){
	header("Location: homeuser.php");
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

	//Se agarra a todos los empleados en la BD para desplegarlos en la pantalla.

	include('dbconnect.php');

	$query = "SELECT * FROM empleados";

	$result = mysqli_query($conn, $query);
	?>
	<div class="container bg-info" style="padding-top:20px; padding-bottom:20px; width:110%;">

		<!-- TITULO Y BOTÓN DE LOGOUT -->
		<div class="row">
			<div class="col-sm-4">
				<h3>Sistema de Vacaciones Beta</h3><br>
				<h2><?php echo $_SESSION["username"] ?></h2>
			</div>
			<div class="col-sm-4"></div>
			<div class="col-sm-4" style="padding-left:300px;">
				<a href="logout.php" class="btn btn-danger" role="button">Logout</a>
			</div>
		</div>
		<!--FIN DE TITULO Y BOTÓN DE LOGOUT -->

		<br>
		<div class="row">
			<div class="col-sm-4">
				<!--FORMA PARA AGREGAR EMPLEADOS -->
				<h3>Agregar Empleado</h3>
				<form role="form" action="insert.php" method="post">
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="nombre" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Apellido</label>
						<input type="text" name="apellido" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Puesto</label>
						<input type="text" name="puesto" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Turno</label>
						<input type="text" name="turno" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Nómina</label>
						<input type="text" name="nomina" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Jefe</label>
						<input type="text" name="jefe" class="form-control" required>
					</div>
					<div class="form-group date">
						<label>Fecha de antigüedad</label>
						<input type="date" name="fechaantiguedad" class="form-control" required>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Add Empleado</button>
				</form><br>
				<!--TERMINA FORMA PARA AGREGAR EMPLEADOS -->
				<!--BOTÓN PARA IR A CHECAR PERMISOS -->
				<a href="checar-permisos.php"><button type="submit" class="btn btn-primary btn-block">Checar Permisos</button></a>
			</div>
			<!-- ACABA -->

			<div class="col-sm-8">
				<!--TABLA QUE DESPLIEGA A TODOS LOS EMPLEADOS Y SU INFORMACIÓN -->
				<h3>Empleados</h3>
				<table class="table">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Puesto</th>
							<th>Turno</th>
							<th>Nómina</th>
							<th>Jefe</th>
							<th>Fecha de Antigüedad</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php

						//Recoger todos los datos que se trajeron de la BD.
						while($row = mysqli_fetch_assoc($result)){

						
						?>
						<tr>
							<td><?php echo $row['nombre']; ?></td>
							<td><?php echo $row['apellido']; ?></td>
							<td><?php echo $row['puesto']; ?></td>
							<td><?php echo $row['turno']; ?></td>
							<td><?php echo $row['nomina']; ?></td>
							<td><?php echo $row['jefe']; ?></td>
							<td><?php echo $row['fechadeantiguedad']; ?></td>
							<td>
								<a href="editform.php?id=<?php echo $row['id']; ?>" class="btn btn-success" role="button">Editar</a>
								<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" role="button">Borrar</a>
							</td>
						</tr>
						<?php
					}

						mysqli_close($conn);
						?>
					</tbody>
				</table>
				<!-- FIN DE LA TABLA -->
				
			</div>
		</div>
	</div>
</body>
</html>