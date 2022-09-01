<?php

if (isset($_POST)) {

    // conexion a la base de datos
    require_once 'assets\include\conexion.php';
    
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;

    $errores = array();

    //validar los datos antes de guardarlo
    //validando nombre 
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_valido = true;
    } else {
        $nombre_valido = false;
        $errores['nombre'] = "El nombre no debe contener numeros";
    }

    if(count($errores) == 0) {

        $sql = "INSERT INTO categorias VALUES (null, '$nombre');";
        $guardar = mysqli_query($db,$sql);

    }
   
    }

    header("Location: index.php");

    ?>