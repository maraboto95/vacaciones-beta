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
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->
</head>
<?php

  //Se conecta a la BD y trae los permisos que estén pendientes.
  include('dbconnect.php');

  $query = "SELECT * FROM empleados";

  $result = mysqli_query($conn, $query);


  ?>
<body>
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
      <figure><img src="basic-90/images/demo/crit.jpg" alt="">
        <figcaption>
          <h2>Sistema de Solicitud de Permisos Crit Tamaulipas</h2>
          <p>Este sistema de administrador es para agregar y revisar información sobre los empleados y checar y aceptar solicitudes de los mismos.</p>
        </figcaption>
      </figure>
    </section>
    <!-- Separación -->
    <div id="intro">
    </div>
    <!-- ########################################################################################## -->
    <!-- ########################################################################################## -->
    <!-- ########################################################################################## -->
    <!-- ########################################################################################## -->

    <!--Contenido Variante/Principal -->
    <div id="homepage" class="last clear contenido">
      <!--Modificar aquí(?) -->
      <center>
        <h3>Agregar Beneficio</h3><br>
            <form action='subir-imagen.php' method='POST' enctype='multipart/form-data' role="form">
            <input type='file' name='userFile' class="form-group"><br><br>
            <label>Descripción del beneficio</label>
            <input type="text" name="descripcion" class="form-control texto" required><br>
            <input type='submit' name='upload_btn' value='Subir imagen' class="form-group">
            </form>
      </center>
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
