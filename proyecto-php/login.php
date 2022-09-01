<?php


//iniciar la seccion y la conexion a la base de datos

require_once 'assets\include\conexion.php';

//recoger los datos del formulario 
if (isset($_POST)) {

    //borrar la sesion antigua
    if(isset($_SESSION['error_login'])){
        unset($_SESSION['error_login']);

    }

    //recogo datos del formulario
    $email = trim($_POST['email']);
    $password = $_POST['password'];



    // cosulta para comprobar las credenciales del usuario
    $sql = " SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $sql);

    if ($login && mysqli_num_rows($login) == 1) {
        $usuario = mysqli_fetch_assoc($login);
        //var_dump($usuario);
        //die();
    }

    // cifrar / comprobar la contraseña
    $verify =password_verify($password, $usuario['password']);
    if ($verify) {
        // se utiliza una sesion para guardar los datos del usuario logueado
        $_SESSION['usuario'] = $usuario;
        
    
    }else {
        //si algo falla enviar una sesion para una session iniciada 

        $_SESSION['error_login'] = "login incorrecto ";

    }
} else{

    //mensaje de error
    
    $_SESSION['error_login'] = "login incorrecto!!";
}


// redirigit al index

header('Location: index.php');
