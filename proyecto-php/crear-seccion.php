
<?php require_once 'assets\include\redireccion.php';?>
<?php require_once 'assets\include\cabecera.php'; ?>
<?php require_once 'assets\include\lateral.php'; ?>

<div id="principal"> 
    <h1>  Crear Seccion </h1>
    <p>
        Nombre de la nueva seccion.
    </p>
    <br/>
    <form action="guardar-seccion.php" method="POST">
        <label>Seccion<input type="text" name="nombre">
        </label>
        <input type="submit" value="Guardar">
    </form>
</div> 

<?php require_once 'assets\include\pie.php'; ?>