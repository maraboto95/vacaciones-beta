<?php
session_start(); // start session

// do check
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit; // prevent further execution, should there be more code that follows
}

//Traer los datos del empleado que está llenando la forma, para llenar la primera parte de la solicitud.
include('dbconnect.php');

$nombre = $_SESSION["username"];

$query = "SELECT * FROM empleados WHERE correo='$nombre'";

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
	<link href="http://cdn.kendostatic.com/2013.2.716/styles/kendo.common.min.css" rel="stylesheet" type="text/css" />
<link href="http://cdn.kendostatic.com/2013.2.716/styles/kendo.rtl.min.css" rel="stylesheet" type="text/css" />
<link href="http://cdn.kendostatic.com/2013.2.716/styles/kendo.default.min.css" rel="stylesheet" type="text/css" />
<link href="http://cdn.kendostatic.com/2013.2.716/styles/kendo.dataviz.min.css" rel="stylesheet" type="text/css" />
<link href="http://cdn.kendostatic.com/2013.2.716/styles/kendo.dataviz.default.min.css" rel="stylesheet" type="text/css" />
<link href="http://cdn.kendostatic.com/2013.2.716/styles/kendo.mobile.all.min.css" rel="stylesheet" type="text/css" />
<script src="https://kendo.cdn.telerik.com/2018.1.221/js/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2018.1.221/js/kendo.all.min.js"></script>
</head>
<body>
	<!-- COMIENZA FORMA DE SOLICITUD DE PERMISOS Y VACACIONES -->
	<div class="row">
		<div class="col-md-2">
			<a href="homeusernew.php"><button class="btn">Regresar</button></a>
		</div>
	<div class="col-md-10" style="padding-left: 95px;">
				<h1>SOLICITUD DE PERMISOS Y VACACIONES</h1><br><br>
	</div>
	<div class="container" style="border:1px solid black;">
		<div class="row">
			<div class="col-md-8">

				<!-- SECCIÓN BASE -->
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
				<input type="text" class="form-control" placeholder="<?php echo $row['jefe']; ?>" style="width:500px;" disabled>
			</div>
			<div class="col-md-4"></div>
		</div><br>
	</div><br>
  <?php

  $fechadeantiguedad = $row['fechadeantiguedad'];
  ?>
	<!-- TERMINA SECCIÓN BASE -->

	<!-- SECCIÓN DE PERMISOS CON GOCE DE SUELDO -->
	<div class="container">
		<div class="row"><br>
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
              <?php

              $query = "SELECT * FROM fechasprohibidas";

              $result=mysqli_query($conn, $query);

              $result2=mysqli_query($conn, $query);

              $result3=mysqli_query($conn, $query);

              $result4=mysqli_query($conn, $query);

              $result5=mysqli_query($conn, $query);

              $result6=mysqli_query($conn, $query);

              $result7=mysqli_query($conn, $query);

              $result8=mysqli_query($conn, $query);

              $result9=mysqli_query($conn, $query);

              $result10=mysqli_query($conn, $query);

              $result11=mysqli_query($conn, $query);

              $result12=mysqli_query($conn, $query);

              $result13=mysqli_query($conn, $query);

              ?>
							<td><input id="datepicker" value="10/10/2011" name="del1" style="width:150px;" min="" />
  <script>
        $(document).ready(function() {

            $("#datepicker").kendoDatePicker({
                value: new Date(),
                min: new Date(),
                dates: [
                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    new Date("<?php echo $row['fechas']; ?>"),
                    <?php } ?>
                ],
                disableDates: function (date) {
                    var dates = $("#datepicker").data("kendoDatePicker").options.dates;
                    if (date && compareDates(date, dates)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            });

            $("#datepicker2").kendoDatePicker({
                value: new Date(),
                min: new Date(),
                dates: [
                    <?php while($row2 = mysqli_fetch_assoc($result2)){ ?>
                    new Date("<?php echo $row2['fechas']; ?>"),
                    <?php } ?>
                ],
                disableDates: function (date) {
                    var dates = $("#datepicker2").data("kendoDatePicker").options.dates;
                    if (date && compareDates(date, dates)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            });

            $("#datepicker3").kendoDatePicker({
                value: new Date(),
                min: new Date(),
                dates: [
                <?php while($row3 = mysqli_fetch_assoc($result3)){ ?>
                    new Date("<?php echo $row3['fechas']; ?>"),
                    <?php } ?>
                ],
                disableDates: function (date) {
                    var dates = $("#datepicker3").data("kendoDatePicker").options.dates;
                    if (date && compareDates(date, dates)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            });

            $("#datepicker4").kendoDatePicker({
                value: new Date(),
                min: new Date(),
                dates: [
                <?php while($row4 = mysqli_fetch_assoc($result4)){ ?>
                    new Date("<?php echo $row4['fechas']; ?>"),
                    <?php } ?>
                ],
                disableDates: function (date) {
                    var dates = $("#datepicker4").data("kendoDatePicker").options.dates;
                    if (date && compareDates(date, dates)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            });

            $("#datepicker5").kendoDatePicker({
                value: new Date(),
                min: new Date(),
                dates: [
                <?php while($row5 = mysqli_fetch_assoc($result5)){ ?>
                    new Date("<?php echo $row5['fechas']; ?>"),
                    <?php } ?>
                ],
                disableDates: function (date) {
                    var dates = $("#datepicker5").data("kendoDatePicker").options.dates;
                    if (date && compareDates(date, dates)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            });

            $("#datepicker6").kendoDatePicker({
                value: new Date(),
                min: new Date(),
                dates: [
                <?php while($row6 = mysqli_fetch_assoc($result6)){ ?>
                    new Date("<?php echo $row6['fechas']; ?>"),
                    <?php } ?>
                ],
                disableDates: function (date) {
                    var dates = $("#datepicker6").data("kendoDatePicker").options.dates;
                    if (date && compareDates(date, dates)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            });

            $("#datepicker7").kendoDatePicker({
                value: new Date(),
                min: new Date(),
                dates: [
                <?php while($row7 = mysqli_fetch_assoc($result7)){ ?>
                    new Date("<?php echo $row7['fechas']; ?>"),
                    <?php } ?>
                ],
                disableDates: function (date) {
                    var dates = $("#datepicker7").data("kendoDatePicker").options.dates;
                    if (date && compareDates(date, dates)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            });

            $("#datepicker8").kendoDatePicker({
                value: new Date(),
                min: new Date(),
                dates: [
                <?php while($row8 = mysqli_fetch_assoc($result8)){ ?>
                    new Date("<?php echo $row8['fechas']; ?>"),
                    <?php } ?>
                ],
                disableDates: function (date) {
                    var dates = $("#datepicker8").data("kendoDatePicker").options.dates;
                    if (date && compareDates(date, dates)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            });

            $("#datepicker9").kendoDatePicker({
                value: new Date(),
                min: new Date(),
                dates: [
                <?php while($row9 = mysqli_fetch_assoc($result9)){ ?>
                    new Date("<?php echo $row9['fechas']; ?>"),
                    <?php } ?>
                ],
                disableDates: function (date) {
                    var dates = $("#datepicker9").data("kendoDatePicker").options.dates;
                    if (date && compareDates(date, dates)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            });

            $("#datepicker10").kendoDatePicker({
                value: new Date(),
                min: new Date(),
                dates: [
                <?php while($row10 = mysqli_fetch_assoc($result10)){ ?>
                    new Date("<?php echo $row10['fechas']; ?>"),
                    <?php } ?>
                ],
                disableDates: function (date) {
                    var dates = $("#datepicker10").data("kendoDatePicker").options.dates;
                    if (date && compareDates(date, dates)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            });

            $("#datepicker11").kendoDatePicker({
                value: new Date(),
                min: new Date(),
                dates: [
                <?php while($row11 = mysqli_fetch_assoc($result11)){ ?>
                    new Date("<?php echo $row11['fechas']; ?>"),
                    <?php } ?>
                ],
                disableDates: function (date) {
                    var dates = $("#datepicker11").data("kendoDatePicker").options.dates;
                    if (date && compareDates(date, dates)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            });

            $("#datepicker12").kendoDatePicker({
                value: new Date(),
                min: new Date(),
                dates: [
                <?php while($row12 = mysqli_fetch_assoc($result12)){ ?>
                    new Date("<?php echo $row12['fechas']; ?>"),
                    <?php } ?>
                ],
                disableDates: function (date) {
                    var dates = $("#datepicker12").data("kendoDatePicker").options.dates;
                    if (date && compareDates(date, dates)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            });

            $("#datepicker13").kendoDatePicker({
                value: new Date(),
                min: new Date(),
                dates: [
                <?php while($row13 = mysqli_fetch_assoc($result13)){ ?>
                    new Date("<?php echo $row13['fechas']; ?>"),
                    <?php } ?>
                ],
                disableDates: function (date) {
                    var dates = $("#datepicker13").data("kendoDatePicker").options.dates;
                    if (date && compareDates(date, dates)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            });

            function compareDates(date, dates) {
                for (var i = 0; i < dates.length; i++) {
                    if (dates[i].getDate() == date.getDate() &&
                        dates[i].getMonth() == date.getMonth() &&
                        dates[i].getYear() == date.getYear()) {
                    return true
                    }
                }
            }
        });
    </script>
   
  <style>
    .disabledDay{
      /* adding some CSS to match the normal days styling */
      display: block;
      overflow: hidden;
      min-height: 22px;
      line-height: 22px;
      padding: 0 .45em 0 .1em;
      cursor:default;
      opacity: 0.5;
    }
    </style></td>
						</tr>
						<tr>
							<td><input id="datepicker2" value="10/10/2011" name="del2" style="width:150px;" min="" />
   
  <style>
    .disabledDay{
      /* adding some CSS to match the normal days styling */
      display: block;
      overflow: hidden;
      min-height: 22px;
      line-height: 22px;
      padding: 0 .45em 0 .1em;
      cursor:default;
      opacity: 0.5;
    }
    </style></td>
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
							<td><input id="datepicker3" value="10/10/2011" name="al1" style="width:150px;" min="" />
   
  <style>
    .disabledDay{
      /* adding some CSS to match the normal days styling */
      display: block;
      overflow: hidden;
      min-height: 22px;
      line-height: 22px;
      padding: 0 .45em 0 .1em;
      cursor:default;
      opacity: 0.5;
    }
    </style></td>
						</tr>
						<tr>
							<td><input id="datepicker4" value="10/10/2011" name="al2" style="width:150px;" min="" />
   
  <style>
    .disabledDay{
      /* adding some CSS to match the normal days styling */
      display: block;
      overflow: hidden;
      min-height: 22px;
      line-height: 22px;
      padding: 0 .45em 0 .1em;
      cursor:default;
      opacity: 0.5;
    }
    </style></td>
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
        <?php

        if($row['titulacion'] != "usado"){
        ?>
				<input type="radio" name="opcion1" value="titulacion" style="height:25px; width:25px;">
        <?php
      }else{
        ?>
        <input type="radio" name="opcion1" value="titulacion" style="height:25px; width:25px;" disabled>
        <?php
      }
        ?>
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
				<?php

        if($row['matrimonio'] != "usado"){
        ?>
        <input type="radio" name="opcion1" value="matrimonio" style="height:25px; width:25px;">
        <?php
      }else{
        ?>
        <input type="radio" name="opcion1" value="matrimonio" style="height:25px; width:25px;" disabled>
        <?php
      }
        ?>
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
	<!--TERMINA SECCIÓN 1 -->

	<!-- SECCIÓN DE PERMISOS SIN GOCE DE SUELDO -->
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
							<td><input id="datepicker5" value="10/10/2011" name="del3" style="width:150px;" min="" />
   
  <style>
    .disabledDay{
      /* adding some CSS to match the normal days styling */
      display: block;
      overflow: hidden;
      min-height: 22px;
      line-height: 22px;
      padding: 0 .45em 0 .1em;
      cursor:default;
      opacity: 0.5;
    }
    </style></td>
						</tr>
						<tr>
							<td><input id="datepicker6" value="10/10/2011" name="del4" style="width:150px;" min="" />
   
  <style>
    .disabledDay{
      /* adding some CSS to match the normal days styling */
      display: block;
      overflow: hidden;
      min-height: 22px;
      line-height: 22px;
      padding: 0 .45em 0 .1em;
      cursor:default;
      opacity: 0.5;
    }
    </style></td>
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
							<td><input id="datepicker7" value="10/10/2011" name="al3" style="width:150px;" min="" />
   
  <style>
    .disabledDay{
      /* adding some CSS to match the normal days styling */
      display: block;
      overflow: hidden;
      min-height: 22px;
      line-height: 22px;
      padding: 0 .45em 0 .1em;
      cursor:default;
      opacity: 0.5;
    }
    </style></td>
						</tr>
						<tr>
							<td><input id="datepicker8" value="10/10/2011" name="al4" style="width:150px;" min="" />
   
  <style>
    .disabledDay{
      /* adding some CSS to match the normal days styling */
      display: block;
      overflow: hidden;
      min-height: 22px;
      line-height: 22px;
      padding: 0 .45em 0 .1em;
      cursor:default;
      opacity: 0.5;
    }
    </style></td>
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
	<!-- TERMINA SECCIÓN 2 -->

	<!-- SECCIÓN DE PERMISOS PARA AUSENTARSE POR HORAS -->
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="border-bottom:1px solid black;">
				<strong>3.PERMISOS PARA AUSENTARSE POR HORAS</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5">
				<label>FECHA:</label>
				<input id="datepicker9" value="10/10/2011" name="fecha" style="width:150px;" min="" />
   
  <style>
    .disabledDay{
      /* adding some CSS to match the normal days styling */
      display: block;
      overflow: hidden;
      min-height: 22px;
      line-height: 22px;
      padding: 0 .45em 0 .1em;
      cursor:default;
      opacity: 0.5;
    }
    </style>
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
	<!-- TERMINA SECCIÓN 3 -->

	<!-- SECCIÓN DE VACACIONES -->
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
							<td><input id="datepicker10" value="10/10/2011" name="del5" style="width:150px;" min="" />
   
  <style>
    .disabledDay{
      /* adding some CSS to match the normal days styling */
      display: block;
      overflow: hidden;
      min-height: 22px;
      line-height: 22px;
      padding: 0 .45em 0 .1em;
      cursor:default;
      opacity: 0.5;
    }
    </style></td>
						</tr>
						<tr>
							<td><input id="datepicker11" value="10/10/2011" name="del6" style="width:150px;" min="" />
   
  <style>
    .disabledDay{
      /* adding some CSS to match the normal days styling */
      display: block;
      overflow: hidden;
      min-height: 22px;
      line-height: 22px;
      padding: 0 .45em 0 .1em;
      cursor:default;
      opacity: 0.5;
    }
    </style></td>
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
							<td><input id="datepicker12" value="10/10/2011" name="al5" style="width:150px;" min="" />
   
  <style>
    .disabledDay{
      /* adding some CSS to match the normal days styling */
      display: block;
      overflow: hidden;
      min-height: 22px;
      line-height: 22px;
      padding: 0 .45em 0 .1em;
      cursor:default;
      opacity: 0.5;
    }
    </style></td>
						</tr>
						<tr>
							<td><input id="datepicker13" value="10/10/2011" name="al6" style="width:150px;" min="" />
   
  <style>
    .disabledDay{
      /* adding some CSS to match the normal days styling */
      display: block;
      overflow: hidden;
      min-height: 22px;
      line-height: 22px;
      padding: 0 .45em 0 .1em;
      cursor:default;
      opacity: 0.5;
    }
    </style></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<label>FECHA DE ANTIGÜEDAD:</label>
				<input type="date" class="form-control" name="fechadeantiguedad" style="width:300px" value="<?php echo $fechadeantiguedad ?>" disabled>
			</div>
		</div><br><br><button type="submit" class="btn btn-info">Solicitar</button></form><br><br>
	</div>
	<!-- TERMINA SECCIÓN 4 -->

	<!-- SECCIÓN DE FIRMAS Y NOMBRES -->
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
	<!-- TERMINA SECCIÓN DE FIRMAS Y NOMBRES -->
</body>
</html>