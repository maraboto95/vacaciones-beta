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
<html lang="en" dir="ltr">
<head>
<title>Vacaciones Beta</title>
<meta charset="utf-8">
<link rel="stylesheet" href="basic-90/styles/layout.css" type="text/css">
<!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->
</head>
<body>
	<?php

	//Se conecta a la BD y trae los permisos que estén pendientes.
	include('dbconnect.php');

	$query = "SELECT * FROM permisos WHERE estatus='pendiente'";

	$result = mysqli_query($conn, $query);


	?>
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1><a href="index.php">Sistema Vacaciones Beta</a></h1>
      <h2>Versión 0.3</h2>
    </div>
    <nav>
      <ul>
        <li><a href="agregar-empleado.php">Agregar Empleado</a></li>
        <li><a href="ver-empleados.php">Ver Empleados</a></li>
        <li><a href="checar-permisos.php">Ver Solicitudes</a></li>
        <li><a href="agregar-noticia.php">Agregar Noticia</a></li>
        <li><a href="ver-noticias-admin.php">Ver Noticias</a></li>
        <li><a href="agregar-beneficio.php">Agregar Beneficio</a></li><br><br>
        <li><a href="ver-beneficios-admin.php">Ver Beneficios</a></li>
        <li><a href="prohibir-fecha.php">Bloquear Fechas</a></li>
        <li class="last"><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
</div>
<!-- content -->
<div class="wrapper row2">
  <div id="container" class="clear">
    <!-- Slider -->
    <section id="slider" class="clear">
      <div class="row">
        <div class="col-sm-8">
      <figure><img src="basic-90/images/demo/crit.jpg" alt="">
        <figcaption>
          <h2>Sistema de Solicitud de Permisos Crit Tamaulipas</h2>
          <p>Este sistema de administrador es para agregar y revisar información sobre los empleados y checar y aceptar solicitudes de los mismos.</p>
        </figcaption>
      </figure><br>
    </div>
    </section>
    <!-- Separación -->
    <div id="intro">
    </div>
    <!-- ########################################################################################## -->
    <!-- ########################################################################################## -->
    <!-- ########################################################################################## -->
    <!-- ########################################################################################## -->

    <!--Contenido Variante/Principal -->
    <div id="homepage" class="last clear">
      <!--Modificar aquí(?) -->
			<div class="col-sm-4" style="padding-left:150px;">
				<center>
				<form action="" method="post">
				<select class="form-control filtro" name="select">
					<option name="filtro" value="pendientes">Pendientes</option>
					<option name="filtro" value="todos">Todos</option>
					<option name="filtro" value="aceptados">Aceptados</option>
					<option name="filtro" value="rechazados">Rechazados</option>
				</select><br>
				<input  class="btn" type="submit" name="submit" value="filtrar">
			</form></center>
			<?php 

			//Se define el filtro para que traiga o los pendientes o todas las solicitudes.
			if(isset($_POST['submit'])){
				if($_POST['select'] == 'pendientes'){
					$query = "SELECT * FROM permisos WHERE estatus='pendiente'";
				}else{
					if($_POST['select'] == 'todos'){
					$query = "SELECT * FROM permisos";
				}else{
					if($_POST['select'] == 'aceptados'){
					$query = "SELECT * FROM permisos WHERE estatus='aceptado'";
				}else{
					if($_POST['select'] == 'rechazados'){
					$query = "SELECT * FROM permisos WHERE estatus='rechazado'";
				}
			}
		}
	}
				$result = mysqli_query($conn, $query);
			}
			?>
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
				<?php
				if($_POST['select'] == 'pendientes'){
				?>
				<a href="aceptar.php?id=<?php echo $row['id']; ?>"><button type="submit" class="btn btn-success btn-block">Aceptar</button></a><br>
				<a href="rechazar.php?id=<?php echo $row['id']; ?>"><button type="submit" class="btn btn-danger btn-block">Rechazar</button></a>
				<?php
			}
				?>
			</div>
			<!-- ACABA PARTE INFERIOR IZQUIERDA DE LA PANTALLA -->

			<!-- PARTE INFERIOR DERECHA DE LA PANTALLA DONDE SE DESPLIEGAN TODOS LOS PERMISOS DE ACUERDO AL FILTRO -->
			<div class="col-sm-8">
				<?php

				if($row['nodediassueldo'] != 0 || $row['nodediassueldo2'] != 0 || $row['delsueldo'] != 0 || $row['delsueldo2'] != 0 || $row['alsueldo'] != 0 || $row['alsueldo2'] != 0){
				?>
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
	<?php
}
				if($row['nodediasnosueldo'] != 0 || $row['nodediasnosueldo2'] != 0 || $row['delnosueldo'] != 0 || $row['delnosueldo2'] != 0 || $row['alnosueldo'] != 0 || $row['alnosueldo2'] != 0){
				?>
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
	<?php
}
				if($row['fechahoras'] != 0 || $row['horariodehoras'] != 0 || $row['horarioahoras'] != 0){
				?>
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
	<?php
}
				if($row['nodediasvacaciones'] != 0 || $row['nodediasvacaciones2'] != 0 || $row['delvacaciones'] != 0 || $row['delvacaciones2'] != 0 || $row['alvacaciones'] != 0 || $row['alvacaciones2'] != 0){
				?>
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
			<?php
}
}
?>
		 <!-- HASTA AQUÍ -->
    </div>
    <!-- / content body -->
  </div>
</div>
<!-- Footer -->
<div class="wrapper row3">
  <footer id="footer" class="clear">
    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Crit Crit</a></p>
  </footer>
</div>
</body>
</html>
