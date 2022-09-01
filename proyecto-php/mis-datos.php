<?php require_once 'assets\include\redireccion.php';?>
<?php require_once 'assets\include\cabecera.php'; ?>
<?php require_once 'assets\include\lateral.php'; ?>

<div id="principal"> 
    <h1> Mis datos</h1>

    <?php if (isset($_SESSION['completado'])) : ?>
            <div class="alerta alerta-exito">
                <?= $_SESSION['completado'] ?>
            </div>
        <?php elseif (isset($_SESSION['errores']['general'])) : ?>
            <div class="alerta alerta-error">
                <?= $_SESSION['errores']['general'] ?>
            </div>


        <?php endif ?>

        <form action="actualizar-usuario.php" method="POST">
            <label>Username<input type="text" name="username" value="<?= $_SESSION['usuario']['username']; ?>" />
            </label>
            <?php echo  isset($_SESSION['errores']) ? mostrarerrores($_SESSION['errores'], 'username') : ''; ?>

            <label>Email<input type="email" name="email"  value="<?= $_SESSION['usuario']['email']; ?>"/>
            </label>
            <?php echo  isset($_SESSION['errores']) ? mostrarerrores($_SESSION['errores'], 'email') : ''; ?>

            
            <input type="submit" name="submit" value="Actualizar" />

        </form>
        <?php borrarErrores(); ?>

</div> 
<?php require_once 'assets\include\pie.php'; ?>