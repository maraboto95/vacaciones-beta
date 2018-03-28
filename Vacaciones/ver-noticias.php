<?php
session_start(); // start session

// do check
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit; // prevent further execution, should there be more code that follows
}

include('dbconnect.php');

$vato = $_SESSION["username"];

$query = "SELECT nombre, apellido FROM empleados WHERE correo='$vato'";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$name = $row['nombre']." ".$row['apellido'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>Vacaciones Beta</title>
<meta charset="utf-8">
<link rel="stylesheet" href="basic-90/styles/layout.css" type="text/css">
<!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->
</head>
<?php

$query = "SELECT * FROM noticias WHERE empleado='$name'";

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
        <li><a href="permisos.php">Solicitar Permiso</a></li>
        <li><a href="ver-noticias.php">Mis notificaciones</a></li>
        <li class="last"><a href="logout.php">Cerrar Sesión</a></li>
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
          <p>Este sistema de empleado es para hacer solicitudes de permisos.</p>
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
      <h2>Noticias de <?php echo $vato; ?></h2><br>
          <?php

            //Recoger todos los datos que se trajeron de la BD.
            while($row = mysqli_fetch_assoc($result)){
            ?>
          <div class="mySlides w3-container w3-red">
    <h1><b><?php echo $row['titulo']; ?></b></h1>
    <h1><i><?php echo $row['noticia']; ?></i></h1>
    <p><?php echo $row['fecha']; ?></p>
  </div>
<?php

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
