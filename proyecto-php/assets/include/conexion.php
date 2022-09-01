<?php
//conexion

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'aprendiendo_sql';

$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'utf8' ");

//iniciar la session
if (!isset($_SESSION)) {
    session_start();
    
}


?>