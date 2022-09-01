

<?php require_once 'assets\include\conexion.php'; ?>
<?php require_once 'assets\include\helpers.php'; ?>
<?php
$categoria_actual = conseguircategoria($db, $_GET['id']);

if (!isset($categoria_actual['id'])) {

    header("Location: index.php");
}

?>

<?php require_once 'assets\include\cabecera.php'; ?>
<?php require_once 'assets\include\lateral.php'; ?>

 <!-- CAJA PRINCIPAL -->
<div id="principal">

    <h1> Categoria : <?=$categoria_actual['nombre'] ?></h1>
    <br />

<?php 

$entradas =conseguirEntradas($db, null , $_GET['id']);

if (!empty($entradas) && mysqli_num_rows($entradas) >= 1): 
    while ($entrada = mysqli_fetch_assoc($entradas)):
?>
 <article class="entrada">
     
        <a href="entrada.php?id=<?=$entrada['id']?>">
            <h2> <?=$entrada['titulo']?></h2>
            <span class="fecha"><?=$entrada['categorias'].' | '.$entrada['fecha']?></span>
            <br />
            <p>
               <?=substr($entrada['descripcion'],0,400)."..."?>
            </p>
            <br />
        </a>
    </article>

<?php

    endwhile;
else:
?>
<div class="alerta"> NO SE A CREADO NINGUNA TEORIA EN ESTA SECCION </div>

<?php endif; ?>
   
</div> <!---DIV PRINCIPAl-->


<!--- PIE DE PAGINA -->
<?php require_once 'assets\include\pie.php'; ?>