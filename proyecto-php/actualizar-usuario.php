
<?php

if (isset($_POST)) {

    // conexion a la base de datos
    require_once 'assets\include\conexion.php';
    
    //recoger valores del usuario  del formulario de actualizacion 
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
  


    $guardar_usuario = false;

    if (count($errores) == 0) {
        $guardar_usuario = true;
//comprobar si el email existe

            $sql = "SELECT id, email FROM usuarios WHERE email = '$email'  ";
            $isset_email = mysqli_query($db, $sql);
            $isset_user= mysqli_fetch_assoc($isset_email);

        if($isset_user['id']== $usuario['id'] || empty($isset_user)){
        //Actualizar datos del usuario  
        $usuario = $_SESSION['usuario'];
        $sql="UPDATE usuarios SET username='$username',email='$email' WHERE id=".$_SESSION['usuario']['id'];  

        $guardar = mysqli_query($db,$sql);

        if ($guardar) {
            $_SESSION['usuario']['username'] = $username;
            $_SESSION['usuario']['email'] = $email;
            $_SESSION['completado'] = "Tus datos se han actualizado";
        } else {
            $_SESSION['errores']['general'] = "Hubo un error en actualizar los datos intente mas tarde";
         }
        }else{
            $_SESSION['errores']['general'] = "El usuario ya existe ";
        }
    } else {
        $_SESSION['errores'] = $errores;
    }
} //si aparece un error quitar este 

header('Location: mis-datos.php');
