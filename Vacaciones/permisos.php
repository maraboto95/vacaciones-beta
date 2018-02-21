<?php
session_start(); // start session

// do check
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit; // prevent further execution, should there be more code that follows
}

include('dbconnect.php');

$nombre = $_SESSION["username"];

$query = "SELECT * FROM empleados WHERE nombre='$nombre'";

$result=mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);
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
	<div class="col-md-12" style="text-align:center">
				<h1>SOLICITUD DE PERMISOS Y VACACIONES</h1><br><br>
	</div>
	<div class="container" style="border:1px solid black;">
		<div class="row">
			<div class="col-md-8">
				<label>Nombre: </label>
				<input type="text" class="form-control" placeholder="<?php echo $row['nombre']; echo $row['apellido'] ?>" style="width:500px;" disabled>
			</div>
			<div class="col-md-4">
				<label>No. de Nómina: </label>
				<input type="text" class="form-control" placeholder="<?php echo $row['nomina'] ?>" style="" disabled>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<label>Puesto: </label>
				<input type="text" class="form-control" placeholder="<?php echo $row['puesto'] ?>" style="width:500px;" disabled>
			</div>
			<div class="col-md-4">
				<label>Turno: </label>
				<input type="text" class="form-control" placeholder="<?php echo $row['turno']; ?>" style="" disabled>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<label>Jefe Inmediato: </label>
				<input type="text" class="form-control" placeholder="<?php echo $row['nombre']; ?>" style="width:500px;" disabled>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div><br>
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="border-bottom:1px solid black;">
				<strong>1.PERMISOS CON GOCE DE SUELDO</strong>
			</div>
			<form class="form-signin" method="post" action="enviar-permiso.php">
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
							<td><input type="text" class="form-control" name="nodias1"></td>
						</tr>
						<tr>
							<td><input type="text" class="form-control" name="nodias2"></td>
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
							<td><input type="date" class="form-control" name="del1"></td>
						</tr>
						<tr>
							<td><input type="date" class="form-control" name="del2"></td>
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
							<td><input type="date" class="form-control" name="al1"></td>
						</tr>
						<tr>
							<td><input type="date" class="form-control" name="al2"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<strong>TITULACIÓN</strong>
			</div>
			<div class="col-md-4">
				<input type="radio" name="opcion1" value="titulacion" style="height:25px; width:25px;">
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<strong>CURSOS, CONGRESOS, SEMINARIOS</strong>
			</div>
			<div class="col-md-4">
				<input type="radio" name="opcion1" value="cursos" style="height:25px; width:25px;">
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<strong>COMISIÓN(MÉDICA/ADMINISTRATIVA)</strong>
			</div>
			<div class="col-md-4">
				<input type="radio" name="opcion1" value="comision" style="height:25px; width:25px;">
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<strong>MATRIMONIO</strong>
			</div>
			<div class="col-md-4">
				<input type="radio" name="opcion1" value="matrimonio" style="height:25px; width:25px;">
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<strong>NACIMIENTO DE HIJOS</strong>
			</div>
			<div class="col-md-4">
				<input type="radio" name="opcion1" value="nacimiento" style="height:25px; width:25px;">
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<strong>FALLECIMIENTO:</strong>
				<input type="text" class="form-control" name="fallecimiento-text" style="width:300px">
			</div>
			<div class="col-md-4">
				<input type="radio" name="opcion1" value="fallecimiento" style="height:25px; width:25px;">
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<strong>OTRO:</strong>
				<input type="text" class="form-control" name="otro-text" style="width:300px">
			</div>
			<div class="col-md-4">
				<input type="radio" name="opcion1" value="otro" style="height:25px; width:25px;">
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
							<td><input type="text" class="form-control" name="nodias3"></td>
						</tr>
						<tr>
							<td><input type="text" class="form-control" name="nodias4"></td>
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
							<td><input type="date" class="form-control" name="del3"></td>
						</tr>
						<tr>
							<td><input type="date" class="form-control" name="del4"></td>
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
							<td><input type="date" class="form-control" name="al3"></td>
						</tr>
						<tr>
							<td><input type="date" class="form-control" name="al4"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<strong>MOTIVO</strong>
				<input type="text" class="form-control" name="motivo1" style="width:300px">
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
				<input type="date" class="form-control" name="fecha" style="width:200px">
			</div>
			<div class="col-md-4">
				<label>HORARIO: </label>
				<label>DE:</label>
				<input type="time" class="form-control" name="horariode">
			</div>
			<div class="col-md-3">
				<label>A:</label>
				<input type="time" class="form-control" name="horarioa">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<strong>MOTIVO</strong>
				<input type="text" class="form-control" name="motivo2" style="width:300px">
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
							<td><input type="text" class="form-control" name="nodias5"></td>
						</tr>
						<tr>
							<td><input type="text" class="form-control" name="nodias6"></td>
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
							<td><input type="date" class="form-control" name="del5"></td>
						</tr>
						<tr>
							<td><input type="date" class="form-control" name="del6"></td>
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
							<td><input type="date" class="form-control" name="al5"></td>
						</tr>
						<tr>
							<td><input type="date" class="form-control" name="al6"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<label>FECHA DE ANTIGÜEDAD:</label>
				<input type="date" class="form-control" name="fechadeantiguedad" style="width:300px" value="<?php echo $row['fechadeantiguedad'] ?>">
			</div>
		</div><br><br><button type="submit" class="btn btn-info">Solicitar</button></form><br><br>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-2" style="padding-left:10px; padding-right:10px">
				<input type="text" class="form-control" name="solicitante" disabled>
			</div>
			<div class="col-md-2" style="padding-left:20px; padding-right:10px">
				<input type="text" class="form-control" name="jefe-inmediato" disabled>
			</div>
			<div class="col-md-2" style="padding-left:30px; padding-right:10px">
				<input type="text" class="form-control" name="jefe-ensenanza" disabled>
			</div>
			<div class="col-md-2" style="padding-left:40px; padding-right:10px">
				<input type="text" class="form-control" name="subdirector" disabled>
			</div>
			<div class="col-md-2" style="padding-left:50px; padding-right:10px">
				<input type="text" class="form-control" name="desarrollo" disabled>
			</div>
		</div>
		<div class="row" style="text-align:center">
			<div class="col-md-2" style="padding-left:25px">
				<strong>SOLICITANTE</strong>
			</div>
			<div class="col-md-2" style="padding-left:45px">
				<strong>AUTORIZACIÓN JEFE INMEDIATO</strong>
			</div>
			<div class="col-md-2" style="padding-left:60px">
				<strong>Vo.Bo. JEFE DE ENSEÑANZA</strong>
			</div>
			<div class="col-md-2" style="padding-left:62px">
				<strong>AUTORIZACIÓN DIR. y/o SUBD. DE ÁREA</strong>
			</div>
			<div class="col-md-2" style="padding-left:66px">
				<strong>Vo.Bo. DESARROLLO HUMANO</strong>
			</div>
		</div>
	</div>
</body>
</html>