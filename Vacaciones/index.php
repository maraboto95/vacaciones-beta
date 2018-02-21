<?php
session_start(); // start session

// do check
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
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

	include('dbconnect.php');

	$query = "SELECT * FROM empleados";

	$result = mysqli_query($conn, $query);
	?>
	<div class="container bg-info" style="padding-top:20px; padding-bottom:20px; width:110%;">
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
		<br>
		<div class="row">
			<div class="col-sm-4">
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
				<a href="checar-permisos.php"><button type="submit" class="btn btn-primary btn-block">Checar Permisos</button></a>
			</div>
			<div class="col-sm-8">
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
			</div>
		</div>
	</div>
</body>
</html>