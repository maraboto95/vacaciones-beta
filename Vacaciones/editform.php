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

//Conexión a la BD
include('dbconnect.php');

//Declaración de variables
$id = $_GET['id'];

$query = "SELECT * FROM empleados WHERE id='$id'";

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
      <h3>Editar Empleado</h3><br>
      <?php

            //Recoger todos los datos que se trajeron de la BD.
            while($row = mysqli_fetch_assoc($result)){

            
            ?>
        <form role="form" action="edit.php" method="get">
          <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
          </div>
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control texto" value="<?php echo $row['nombre']; ?>" required>
          </div>
          <div class="form-group">
            <label>Apellido</label>
            <input type="text" name="apellido" class="form-control texto" value="<?php echo $row['apellido']; ?>" required>
          </div>
          <div class="form-group">
            <label>Puesto</label>
            <input type="text" name="puesto" class="form-control texto" value="<?php echo $row['puesto']; ?>" required>
          </div>
          <div class="form-group">
            <label>Turno</label>
            <input type="text" name="turno" class="form-control texto" value="<?php echo $row['turno']; ?>" required>
          </div>
          <div class="form-group">
            <label>Nómina</label>
            <input type="text" name="nomina" class="form-control texto" value="<?php echo $row['nomina']; ?>" required>
          </div>
          <div class="form-group">
            <label>Jefe</label>
            <input type="text" name="jefe" class="form-control texto" value="<?php echo $row['jefe']; ?>" required>
          </div><br>
          <button type="submit" class="btn btn-primary btn-block">Edit Empleado</button>
        </form><br></center>
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