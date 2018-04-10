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

  <?php

include('dbconnect.php');

$query = "SELECT * FROM convenios";

$result = mysqli_query($conn, $query);

?>

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
              <a class="nav-link" href="homeusernew.php">Inicio</a>
            </li>
            <li class="nav-item text-white">
              <a class="nav-link" href="permisos.php">Solicitar Permiso</a>
            </li>
            <li class="nav-item text-white">
              <a class="nav-link" href="ver-noticiasnew.php">Mis Notificaciones</a>
            </li>
            <li class="nav-item text-white">
              <a class="nav-link text-white" href="ver-beneficiosnew.php">Ver Beneficios
              <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item text-white">
              <a class="nav-link" href="logout.php">Cerrar Sesión</a>
            </li>
            <link href="http://cdn.phpoll.com/css/animate.css" rel="stylesheet">
    
<div class="container">
    <div class="row">       
          </ul>
        </div>
      </div>
    </nav>
    <br>
    <br>
    <br>
    <br>

    <?php

            //Recoger todos los datos que se trajeron de la BD.
            while($row = mysqli_fetch_assoc($result)){
            ?>
          <div class="beneficios">
    <img src="imagenes/beneficios/<?php echo $row['imagen']; ?>" class="beneficios"><br>
    <p><?php echo $row['descripcion']; ?></p>
  </div><br>
<?php

        }
          ?>


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
