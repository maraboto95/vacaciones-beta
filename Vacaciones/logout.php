<?php

//Código para cerrar sesión como administrador
session_start();
session_destroy();

session_start();
$_SESSION['attempt'] = 0;

header('Location: indexnew.php')

?>