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
<?php

include('dbconnect.php');

$query = "SELECT * FROM noticias";

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
          <?php

            //Recoger todos los datos que se trajeron de la BD.
            while($row = mysqli_fetch_assoc($result)){
            ?>
          <div class="mySlides w3-container w3-red">
    <h1><b><?php echo $row['titulo']; ?></b></h1>
    <h1><i><?php echo $row['noticia']; ?></i></h1>
    <p><?php echo $row['fecha']; ?></p>
    <p><?php echo $row['empleado']; ?></p>
                <a href="editar-noticia.php?id=<?php echo $row['id']; ?>" role="button"><button class="btn">Editar</button></a>
                <a href="borrar-noticia.php?id=<?php echo $row['id']; ?>" role="button" onclick="return confirm('Seguro que quieres borrar?')"><button class="btn">Borrar</button></a>
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
