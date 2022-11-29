<!DOCTYPE html>
<html lang="en">
    <!--
        Autor: Manuel Martín Alonso.
        Utilidad: Este programa consiste en calcular la fecha y el día de la semana de dentro de 60 días.
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
            <h2>6. Operar con fechas: calcular la fecha y el día de la semana de dentro de 60 días.</h2>
        </div>
        <?php
            //Creación de un objeto Datetime().
            $fechaactual = new DateTime();
            //Imprimimos por pantalla la fecha formateada con el método format().
            echo "Fecha actual: ".$fechaactual->format('d m Y o H:i:s')."<br>";
            //Mediante el método  date_add() le sumamos un intervalo de tiempo a la fecha actual y la sacamos de manera formateada con el método date_format().
            date_add($fechaactual, date_interval_create_from_date_string("60 days"));
            echo "Fecha después de 60 dias: ".date_format($fechaactual,"d-m-Y H:i:s");
        ?>  
        <a href="../indexProyectoTema3.php"><img src="../webroot/volver.png" alt="volver" class="volver2"/></a>
        <footer>
            <div><a href="../indexProyectoTema3.php"><img src="../webroot/logo_propio.png" alt="logo" id="logo"></a></div>
            2022-23 Manuel Martín Alonso. ©Todos los derechos reservados.
            <a href="https://github.com/Manuel0119" target="_blank"><img src="../webroot/github-logo.png" alt="github" id="g"></a>
            <a href="doc/CV - Manuel Martín Alonso.pdf" target="_blank"><img src="../webroot/curriculum-logo.png" alt="curriculum" id="curricu"></a>
        </footer>
    </body>
</html>

