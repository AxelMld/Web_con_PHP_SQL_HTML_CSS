

<?php require_once 'assets\include\conexion.php'; ?>
<?php require_once 'assets\include\helpers.php'; ?>
<?php
$entrada_actual = conseguirEntrada($db, $_GET['id']);

if (!isset($entrada_actual['id'])) {

    header("Location: index.php");
}

?>

<?php require_once 'assets\include\cabecera.php'; ?>
<?php require_once 'assets\include\lateral.php'; ?>

 <!-- CAJA PRINCIPAL -->
<div id="principal">

    <h1><?=$entrada_actual['titulo'] ?></h1>
    <br />
<a href="categoria.php?id=<?=$entrada_actual['categoria_id']?>">
        <h2><?= $entrada_actual ['categoria']?></h2>
    </a>
    <h4><?= $entrada_actual ['fecha']?></h4>
    <p>
   <?= $entrada_actual ['descripcion']?>
        
    </p>
   
</div> <!---DIV PRINCIPAl-->


<!--- PIE DE PAGINA -->
<?php require_once 'assets\include\pie.php'; ?>