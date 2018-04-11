<?php
session_start();
if($_SESSION['attempt'] == null){
  $_SESSION['attempt'] = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Crit Tamaulipas</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/half-slider.css" rel="stylesheet">
    <link rel="stylesheet" href="basic-90/styles/layout.css" type="text/css">

  </head>

  <body class="new"> 
    <nav class="navbar navbar-expand-lg  navbar-light" style="background-color: #3c153b;" >
  <div class="container">
      <img src="imagenes/blanco_v.png" width="130px" height="90px" alt="descripcion de la imagen" align="right">

        <a class="navbar-brand text-white" href="#" >CRIT TAMAULIPAS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" 
        aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link text-white" href="http://localhost/vacaciones/indexnew.php">Inicio
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <link href="http://cdn.phpoll.com/css/animate.css" rel="stylesheet">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #3c153b;">
      <div class="container-fluid">
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown nav-item text-white">
                        <a href="http://phpoll.com/register" class="dropdown-toggle" data-toggle="dropdown">Log in <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-lr animated flipInX" role="menu">
                            <div class="col-lg-12">
                                <div class="text-center"><h3><b>Log in</b></h3></div>
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
                            </div>
                        </ul>
                    </li>
                </ul>
      </div>
    </div>
  </nav>
    
<div class="container">
    <div class="row">       
          </ul>
        </div>
      </div>
    </nav>
    <br>
    <br>
    <br>
    <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="imagenes/1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="imagenes/8.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="imagenes/3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </header>
    <br>

    <!-- Footer -->
    <footer class="py-5 navbar-light" style="background-color: #3c153b;">

      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; 2018 - All Rights Reserved - Crit Tamaulipas</p>
        <P class="m-0 text-center text-white" >Fundación Teletón México A.C. Es una asociación civil sin fines de lucro, autorizada por el SAT para recibir donativos deducibles. RFC: FTM981104540</P>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    

  </body>

</html>
