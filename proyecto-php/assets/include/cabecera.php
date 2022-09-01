

<?php require_once 'conexion.php'; ?>
<?php require_once 'assets\include\helpers.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>ONE PIECE BLOG</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
</head>

<body>
    <!--CABECERA -->

    <header id="header">
        <!--logo-->
        <div class="logo">
            <a href="index.php">
                ONE PIECE BLOG
            </a>
        </div>
        <!---MENU-->
        
        <nav id="menu">
            <ul>
                <li>
                    <a href="index.php"> Inicio</a>
                </li>
                
                <?php 
                    $categorias = conseguircategorias($db);
                    if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):
                
                ?>
                <li>
                    <a href="categoria.php?id=<?=$categoria['id']?>"><?=$categoria['nombre']?></a>
                </li>
                
                <?php
                    
                    endwhile;
                endif;
                 ?>

                <li>
                    <a href="index.php"> Sobre mi </a>
                </li>
                <li>
                    <a href="index.php"> Contacto </a>
                </li>

            </ul>

        </nav>
        <div class="clearfix"></div>

    </header>
    <div id="container">

    </div>