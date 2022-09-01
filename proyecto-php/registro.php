
<?php

if (isset($_POST)) {

    // conexion a la base de datos
    require_once 'assets\include\conexion.php';
    if (!isset($_SESSION)) {
        
    session_start();
    }

    $username = isset($_POST['username']) ? mysqli_real_escape_string($db,$_POST['username']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

    //array de errores
    $errores = array();

    //validar los datos antes de guardarlo


    //validando username 
    if (!empty($username) && !is_numeric($username) && !preg_match("/[0-9]/", $username)) {
        $username_valido = true;
    } else {
        $username_valido = false;
        $errores['username'] = "El username no debe contener numeros";
    }
    //validar email 

    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_valido = true;
    } else {
        $email_valido = false;
        $errores['email'] = "El email no es correcto";
    }
    //validar password
    if (!empty($password)) {
        $password_valido = true;
    } else {
        $password_valido = false;
        $errores['password'] = "La contraseña esta vacia";
    }


    $guardar_usuario = false;

    if (count($errores) == 0) {
        $guardar_usuario = true;

        //cifrar la contraseña 
        $password_segura =  password_hash($password, PASSWORD_BCRYPT, ['cost=>6']);

        //registrarlo en la base de datos en la trabla correspondiente 
        $sql = "INSERT INTO usuarios VALUES (null, '$username','$email', '$password_segura', CURDATE());";
        $guardar = mysqli_query($db,$sql);

        //var_dump (mysqli_errno($db));
        //die();

        if ($guardar) {
            $_SESSION['completado'] = "El resgistro a sido exitoso";
        } else {
            $_SESSION['errores']['general'] = "Fallo al guardar el usuario";
         }
    } else {
        $_SESSION['errores'] = $errores;
    }
} //si aparece un error quitar este 

header('Location: index.php');



?>