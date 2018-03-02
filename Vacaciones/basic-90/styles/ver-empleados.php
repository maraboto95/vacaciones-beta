<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>Vacaciones Beta</title>
<meta charset="utf-8">
<link rel="stylesheet" href="styles/layout.css" type="text/css">
<!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->
</head>
<body>
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1><a href="#">Sistema Vacaciones Beta</a></h1>
      <h2>Versión 0.3</h2>
    </div>
    <nav>
      <ul>
        <li><a href="agregar-empleado.php">Agregar Empleado</a></li>
        <li><a href="ver-empleado">Ver Empleados</a></li>
        <li><a href="#">Ver Solicitudes</a></li>
        <li class="last"><a href="#">Logout</a></li>
      </ul>
    </nav>
  </header>
</div>
<!-- content -->
<div class="wrapper row2">
  <div id="container" class="clear">
    <!-- Slider -->
    <section id="slider" class="clear">
      <figure><img src="images/demo/crit.jpg" alt="">
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
    <div id="homepage" class="last clear">
      <!--Modificar aquí(?) -->
      <h3>Empleados</h3>
        <table class="table">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Puesto</th>
              <th>Turno</th>
              <th>Nómina</th>
              <th>Jefe</th>
              <th>Fecha de Antigüedad</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php

            //Recoger todos los datos que se trajeron de la BD.
            while($row = mysqli_fetch_assoc($result)){

            
            ?>
            <tr>
              <td><?php echo $row['nombre']; ?></td>
              <td><?php echo $row['apellido']; ?></td>
              <td><?php echo $row['puesto']; ?></td>
              <td><?php echo $row['turno']; ?></td>
              <td><?php echo $row['nomina']; ?></td>
              <td><?php echo $row['jefe']; ?></td>
              <td><?php echo $row['fechadeantiguedad']; ?></td>
              <td>
                <a href="editform.php?id=<?php echo $row['id']; ?>" class="btn btn-success" role="button">Editar</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" role="button">Borrar</a>
              </td>
            </tr>
            <?php
          }

            mysqli_close($conn);
            ?>
          </tbody>
        </table>
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
