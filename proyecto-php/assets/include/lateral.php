<?php require_once 'assets\include\helpers.php'; ?>
<aside id="silderbar">

    <?php if (isset($_SESSION['usuario'])) : ?>
        <div id="usurio_logueado" class="block">
            <h3> Bienvenido a la tripulacion!!!: <?= $_SESSION['usuario']['username'] . ''; ?> </h3>
            <!--botones -->
            <a href="crear-teoria.php" class="boton">Crear Teoria</a>
            <a href="crear-seccion.php" class="boton">Crear seccion</a>
            <a href="mis-datos.php" class="boton">Mis Datos</a>
            <a href="cerrar.php" class="boton">Cerrar Sesión</a>
            

        </div>
    <?php endif ?>


    <?php if (!isset($_SESSION['usuario'])) : ?>
    <div id="login" class="block">
        <h3>Entrar</h3>

        <?php if (isset($_SESSION['error_login'])) : ?>
            <div  class="alerta alerta-error">
            <?=$_SESSION['error_login']; ?>

            </div>
        <?php endif ?>




        <br />
        <form action="login.php" method="POST">
            <label>Email<input type="email" name="email" />
            </label>
            <label> Contaseña<input type="password" name="password" />
            </label>
            <input type="submit" value="Entrar" />

        </form>
    </div>

    <div id="register" class="block">

        <h3>Registrate</h3>
        <br />
        <!--mostrar errores-->
        <?php if (isset($_SESSION['completado'])) : ?>
            <div class="alerta alerta-exito">
                <?= $_SESSION['completado'] ?>
            </div>
        <?php elseif (isset($_SESSION['errores']['general'])) : ?>
            <div class="alerta alerta-error">
                <?= $_SESSION['errores']['general'] ?>
            </div>


        <?php endif ?>

        <form action="registro.php" method="POST">
            <label>Username<input type="text" name="username" />
            </label>
            <?php echo  isset($_SESSION['errores']) ? mostrarerrores($_SESSION['errores'], 'username') : ''; ?>

            <label>Email<input type="email" name="email" />
            </label>
            <?php echo  isset($_SESSION['errores']) ? mostrarerrores($_SESSION['errores'], 'email') : ''; ?>

            <label> Contaseña<input type="password" name="password" />
            </label>
            <?php echo  isset($_SESSION['errores']) ? mostrarerrores($_SESSION['errores'], 'password') : ''; ?>

            <input type="submit" name="submit" value="Registrarse" />

        </form>
        <?php borrarErrores(); ?>

    </div>
    <?php endif;?>

</aside>