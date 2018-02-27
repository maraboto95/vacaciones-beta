<?php
//Código para la página de checar permisos

session_start(); // start session

// do check
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit; // prevent further execution, should there be more code that follows
}

//si el usuario no cuenta con los permisos para ver esta página, redireccionar a login.
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

	//Se conecta a la BD y trae los permisos que estén pendientes.
	include('dbconnect.php');

	$query = "SELECT * FROM permisos WHERE estatus='pendiente'";

	$result = mysqli_query($conn, $query);


	?>
	<!-- PARTE SUPERIOR DE LA PANTALLA DONDE ESTÁ EL TITULO, FILTRO Y BOTÓN DE LOGOUT -->
	<div class="container bg-info" style="padding-top:20px; padding-bottom:20px;">
		<div class="row">
			<div class="col-sm-4">
				<h3>Sistema de Vacaciones Beta</h3><br>
				<a href="index.php"><button type="submit" class="btn btn-primary btn-block">Regresar</button></a>
			</div>
			<div class="col-sm-4" style="padding-left:150px;">
				<form action="" method="post">
				<select class="form-control" name="select">
					<option name="filtro" value="pendientes">Pendientes</option>
					<option name="filtro" value="todos">Todos</option>
				</select>
				<input  class="btn" type="submit" name="submit" value="filtrar">
			</form>
			<?php 

			//Se define el filtro para que traiga o los pendientes o todas las solicitudes.
			if(isset($_POST['submit'])){
				if($_POST['select'] == 'pendientes'){
					$query = "SELECT * FROM permisos WHERE estatus='pendiente'";
				}else{
					$query = "SELECT * FROM permisos";
				}
				$result = mysqli_query($conn, $query);
			}
			?>
			</div>
			<div class="col-sm-4" style="padding-left:300px;">
				<a href="logout.php" class="btn btn-danger" role="button">Logout</a>
			</div>
		</div>
		<!-- ACABA PARTE SUPERIOR DE LA PANTALLA -->
		<br>
		<?php

			//Se trae la información de cada una de las solicitudes para desplegarlas en el HTML.
			while($row = mysqli_fetch_assoc($result)){

						
			?>
		<!-- PARTE INFERIOR IZQUIERDA DE LA PANTALLA DONDE SE DESPLIEGA EL NOMBRE DEL SOLICITANTE DEL PERMISO Y LOS BOTONES DE ACEPTAR Y RECHAZAR -->
		<div class="row">
			<div class="col-sm-4">
				<h2><strong>Permiso de <?php echo $row['nombredesolicitante']; ?>, Estatus: <?php echo $row['estatus']; ?></strong></h2>
				<a href="aceptar.php?id=<?php echo $row['id']; ?>"><button type="submit" class="btn btn-success btn-block">Aceptar</button></a><br>
				<a href="rechazar.php?id=<?php echo $row['id']; ?>"><button type="submit" class="btn btn-danger btn-block">Rechazar</button></a>
			</div>
			<!-- ACABA PARTE INFERIOR IZQUIERDA DE LA PANTALLA -->

			<!-- PARTE INFERIOR DERECHA DE LA PANTALLA DONDE SE DESPLIEGAN TODOS LOS PERMISOS DE ACUERDO AL FILTRO -->
			<div class="col-sm-8">
				<h3>Permisos</h3>
				<div class="container">
		<div class="row">
			<div class="col-md-12" style="border-bottom:1px solid black;">
				<strong>1.PERMISOS CON GOCE DE SUELDO</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<table class="table">
					<thead>
						<tr>
							<th>No. DE DÍAS:</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php 
							if($row['nodediassueldo'] == 0){
								echo " ";
							}else{
								echo $row['nodediassueldo']; 
							}?></td>
						</tr>
						<tr>
							<td><?php 
							if($row['nodediassueldo2'] == 0){
								echo " ";
							}else{
								echo $row['nodediassueldo2']; 
							}?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-4">
				<table class="table">
					<thead>
						<tr>
							<th>DEL</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php 
							if($row['delsueldo'] == 0){
								echo " ";
							}else{
								echo $row['delsueldo']; 
							}?></td>
						</tr>
						<tr>
							<td><?php 
							if($row['delsueldo2'] == 0){
								echo " ";
							}else{
								echo $row['delsueldo2']; 
							}?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-4">
				<table class="table">
					<thead>
						<tr>
							<th>AL</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php 
							if($row['alsueldo'] == 0){
								echo " ";
							}else{
								echo $row['alsueldo']; 
							}?></td>
						</tr>
						<tr>
							<td><?php 
							if($row['alsueldo2'] == 0){
								echo " ";
							}else{
								echo $row['alsueldo2']; 
							}?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<strong>MOTIVO</strong>
				<?php echo $row['razondepermiso']; ?>
			</div>
		</div><br>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="border-bottom:1px solid black;">
				<strong>2.PERMISOS SIN GOCE DE SUELDO</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<strong>FALTA INJUSTIFICADA</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<table class="table">
					<thead>
						<tr>
							<th>No. DE DÍAS:</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php 
							if($row['nodediasnosueldo'] == 0){
								echo " ";
							}else{
								echo $row['nodediasnosueldo']; 
							}?></td>
						</tr>
						<tr>
							<td><?php 
							if($row['nodediasnosueldo2'] == 0){
								echo " ";
							}else{
								echo $row['nodediasnosueldo2']; 
							}?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-4">
				<table class="table">
					<thead>
						<tr>
							<th>DEL</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php 
							if($row['delnosueldo'] == 0){
								echo " ";
							}else{
								echo $row['delnosueldo']; 
							}?></td>
						</tr>
						<tr>
							<td><?php 
							if($row['delnosueldo2'] == 0){
								echo " ";
							}else{
								echo $row['delnosueldo2']; 
							}?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-4">
				<table class="table">
					<thead>
						<tr>
							<th>AL</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php 
							if($row['alnosueldo'] == 0){
								echo " ";
							}else{
								echo $row['alnosueldo']; 
							}?></td>
						</tr>
						<tr>
							<td><?php 
							if($row['alnosueldo2'] == 0){
								echo " ";
							}else{
								echo $row['alnosueldo2']; 
							}?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<strong>MOTIVO</strong>
				<?php echo $row['motivosinsueldo']; ?>
			</div>
		</div><br>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="border-bottom:1px solid black;">
				<strong>3.PERMISOS PARA AUSENTARSE POR HORAS</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5">
				<label>FECHA:</label>
				<?php 
							if($row['fechahoras'] == 0){
								echo " ";
							}else{
								echo $row['fechahoras']; 
							}?>
			</div>
			<div class="col-md-4">
				<label>HORARIO: </label>
				<label>DE:</label>
				<?php 
							if($row['horariodehoras'] == 0){
								echo " ";
							}else{
								echo $row['horariodehoras']; 
							}?>
			</div>
			<div class="col-md-3">
				<label>A:</label>
				<?php 
							if($row['horarioahoras'] == 0){
								echo " ";
							}else{
								echo $row['horarioahoras']; 
							}?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<strong>MOTIVO</strong>
				<?php echo $row['motivohoras']; ?>
			</div>
		</div><br>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="border-bottom:1px solid black;">
				<strong>4. VACACIONES</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<table class="table">
					<thead>
						<tr>
							<th>No. DE DÍAS:</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php 
							if($row['nodediasvacaciones'] == 0){
								echo " ";
							}else{
								echo $row['nodediasvacaciones']; 
							}?></td>
						</tr>
						<tr>
							<td><?php 
							if($row['nodediasvacaciones2'] == 0){
								echo " ";
							}else{
								echo $row['nodediasvacaciones2']; 
							}?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-4">
				<table class="table">
					<thead>
						<tr>
							<th>DEL</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php 
							if($row['delvacaciones'] == 0){
								echo " ";
							}else{
								echo $row['delvacaciones']; 
							}?></td>
						</tr>
						<tr>
							<td><?php 
							if($row['delvacaciones2'] == 0){
								echo " ";
							}else{
								echo $row['delvacaciones2']; 
							}?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-4">
				<table class="table">
					<thead>
						<tr>
							<th>AL</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php 
							if($row['alvacaciones'] == 0){
								echo " ";
							}else{
								echo $row['alvacaciones']; 
							}?></td>
						</tr>
						<tr>
							<td><?php 
							if($row['alvacaciones2'] == 0){
								echo " ";
							}else{
								echo $row['alvacaciones2']; 
							}?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<label>FECHA DE ANTIGÜEDAD:</label>
				<?php echo $row['fechadeantiguedad']; ?>
			</div>
		</div>
			</div>
		</div>
	</div>
	<!-- ACABA PARTE INFERIOR DERECHA DE LA PANTALLA -->
	<?php
					}

					//Se cierra la conexión a la BD.
						mysqli_close($conn);
						?>
</body>
</html>