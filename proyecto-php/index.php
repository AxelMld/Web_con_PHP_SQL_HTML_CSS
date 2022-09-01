<?php require_once 'assets\include\cabecera.php'; ?>
<?php require_once 'assets\include\lateral.php'; ?>

 <!-- CAJA PRINCIPAL -->
<div id="principal"> 
    <h1> Ultimas Teorias </h1>
    <br />

<?php 

$entradas =conseguirEntradas($db, true);
if (!empty($entradas)): 
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
endif;

?>
   
   

    <div id="ver-todas">
        <a href="entradas.php">VER TODAS LAS ENTRADAS</a>
    </div>
</div> <!---DIV PRINCIPAl-->


<!--- PIE DE PAGINA -->
<?php require_once 'assets\include\pie.php'; ?>