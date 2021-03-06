<?php
session_start();
if($_SESSION['attempt'] == null){
  $_SESSION['attempt'] = 0;
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
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1><a href="index.php">Sistema Vacaciones Beta</a></h1>
      <h2>Versión 0.4</h2>
    </div>
    <nav>
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
        <figcaption style="height: 325px;">
          <h2>Sistema de Solicitud de Permisos</h2>
          <form class="form-signin" method="post" action="manejador.php">
					<center>
					<h3 class="form-signin-heading">Iniciar Sesión</h3>
          <?php
          if($_SESSION['attempt'] > 0){
          ?>
          <p class="bad">Correo o Contraseña incorrectos</p>
          <?php
        }
          ?>
					<label for="user" class="sr-only">Correo Institucional</label>
					<input type="text" name="usuario" class="form-control login" placeholder="E-mail" required autofocus>
					<label for="password" class="sr-only">Contraseña</label>
					<input type="password" name="password" class="form-control login" placeholder="Password" required><br>
					<input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Entrar">
				</center>
				</form>
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