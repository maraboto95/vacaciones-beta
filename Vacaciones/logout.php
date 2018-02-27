<?php

//Código para cerrar sesión como administrador
session_start();
session_destroy();

header('Location: login.php')

?>