<?php require_once 'assets\include\redireccion.php';?>
<?php require_once 'assets\include\cabecera.php'; ?>
<?php require_once 'assets\include\lateral.php'; ?>

<div id="principal"> 
    <h1>  Crear Teoria </h1>
    <p>
        ¿Cual es la nueva teoria?
    </p>
    <br/>
    <form action="guardar-teoria.php" method="POST">
        <label>Nombre de la teoria<input type="text" name="titulo">
        </label>
          <?php echo  isset($_SESSION['errores_entrada']) ? mostrarerrores($_SESSION['errores_entrada'],'titulo') : ''; ?>

        <label>Explica cual es tu teoria y por que. 
        </label>
        <textarea name="descripcion">  </textarea> 
          <?php echo  isset($_SESSION['errores_entrada']) ? mostrarerrores($_SESSION['errores_entrada'],'descripcion') : ''; ?>

        <label for="categoria">Selecciona la seccion </label>
        <select name="categoria">
            <?php
            $categorias  = conseguircategorias($db);
            if(!empty($categorias)):
            while ($categoria = mysqli_fetch_assoc($categorias)):
        ?>
            <option value="<?=$categoria['id']?>">
        <?=$categoria['nombre']?>
    </option>
        <?php
        
        endwhile;
        endif;
        ?>

        </select>
        <?php echo  isset($_SESSION['errores_entrada']) ? mostrarerrores($_SESSION['errores_entrada'], 'categoria') : ''; ?>


        <input type="submit" value="Guardar">
    </form>
    <?php borrarErrores(); ?>
</div> 

<?php require_once 'assets\include\pie.php'; ?>