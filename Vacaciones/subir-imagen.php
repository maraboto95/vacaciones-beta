<?php
			$descripcion = $_POST['descripcion'];
			$nombres = $_FILES['userFile']['name'];
            $target_Path = "imagenes/beneficios/";
            $target_Path = $target_Path.basename( $_FILES['userFile']['name'] );
            move_uploaded_file( $_FILES['userFile']['tmp_name'], $target_Path );

//Código que Agrega a un empleado a la BD.

//Conexión

include('dbconnect.php');

//Query

$query = "INSERT INTO convenios(imagen, descripcion) VALUES('$nombres', '$descripcion')";

if(mysqli_query($conn, $query)){
	echo "Insert exitoso";
}else{
	echo "Error";
}

mysqli_close($conn);

            header('Location: agregar-beneficio.php');
            ?>