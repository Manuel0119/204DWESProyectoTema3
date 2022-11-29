<!DOCTYPE html>
<html lang="en">
    <!--
        Autor: Manuel Martín Alonso.
        Utilidad: Este programa consiste en construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas recogidas.
        Fecha-última-revisión: 13-11-2022.
    -->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ManuelMartínAlonso</title>
        <link rel="stylesheet" href="../webroot/css/estilos.css">
        <link rel="icon" type="image/ico" sizes="32x32" href="../webroot/favicon.ico">
    </head>
    <body>
        <div class="encabezado">
            <h2>
                22. Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
                recogidas.
            </h2>
        </div>
        <?php
            //Comprobar si se ha enviado el formulario.
            if (isset($_POST['enviar'])){
                $inputNombre=$_POST['nombre'];//Variable que almacena el nombre del usuario.
                $inputAltura=$_POST['altura'];//Variable que almacana la altura del usuario. 
                print_r("Nombre: $inputNombre<br>");
                print_r("Altura: $inputAltura cm");
            }else{
        ?>
        <!-- Creación de un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas. -->
        <form name="ejercicio22" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="containerform">
                <label>Nombre: </label>
                <input type="text" name="nombre"/><!-- Nombre del usuario. -->
            </div>
            <div class="containerform">
                <label>Altura(cm): </label>
                <input type="text" name="altura"/><!-- Altura del usuario. -->
            </div>
            <div class="containerform">
                <input type="submit" name="enviar" value="Enviar"/><!-- Botón de enviar. -->
            </div>
        </form>
            <?php }?>
        <a href="../indexProyectoTema3.php"><img src="../webroot/volver.png" alt="volver" class="volver2"/></a>
        <footer>
            <div><a href="../indexProyectoTema3.php"><img src="../webroot/logo_propio.png" alt="logo" id="logo"></a></div>
            2022-23 Manuel Martín Alonso. ©Todos los derechos reservados.
            <a href="https://github.com/Manuel0119" target="_blank"><img src="../webroot/github-logo.png" alt="github" id="g"></a>
            <a href="doc/CV - Manuel Martín Alonso.pdf" target="_blank"><img src="../webroot/curriculum-logo.png" alt="curriculum" id="curricu"></a>
        </footer>
    </body>
</html>

