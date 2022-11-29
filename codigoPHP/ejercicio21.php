<!DOCTYPE html>
<html lang="en">
    <!--
        Autor: Manuel Martín Alonso.
        Utilidad: Este programa consiste en construir un formulario para recoger un cuestionario realizado a una persona y enviarlo a una página Tratamiento.php para que muestre las preguntas y las respuestas recogidas.
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
                21. Construir un formulario para recoger un cuestionario realizado a una persona y enviarlo a una página Tratamiento.php para que muestre
                las preguntas y las respuestas recogidas.
            </h2>
        </div>
        <!-- Creación de un formulario para recoger un cuestionario realizado a una persona y enviarlo a una página Tratamiento.php. -->
        <form name="ejercicio21" action="Tratamiento.php" method="post">
            <div class="containerform">
                <label>Nombre: </label>
                <input type="text" name="nombre"/><!-- Nombre del usuario. -->
            </div>
            <div class="containerform">
                <label>Altura(cm): </label>
                <input type="text" name="altura"/><!-- Altura del usuario. -->
            </div>
            <div class="containerform">
                <label>Fecha de nacimiento: </label>
                <input type="text" name="fechaNacimiento"/><!-- Fecha de nacimiento del usuario. -->
            </div>
            <div class="containerform">
                <input type="submit" value="Enviar"/><!-- Botón de enviar. -->
            </div>
        </form>
        <a href="../indexProyectoTema3.php"><img src="../webroot/volver.png" alt="volver" class="volver2"/></a>
        <footer>
            <div><a href="../indexProyectoTema3.php"><img src="../webroot/logo_propio.png" alt="logo" id="logo"></a></div>
            2022-23 Manuel Martín Alonso. ©Todos los derechos reservados.
            <a href="https://github.com/Manuel0119" target="_blank"><img src="../webroot/github-logo.png" alt="github" id="g"></a>
            <a href="doc/CV - Manuel Martín Alonso.pdf" target="_blank"><img src="../webroot/curriculum-logo.png" alt="curriculum" id="curricu"></a>
        </footer>
    </body>
</html>
