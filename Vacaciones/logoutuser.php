<?php

//Código para cerrar sesión como empleado.
session_start();
session_destroy();

header('Location: loginuser.php')

?>