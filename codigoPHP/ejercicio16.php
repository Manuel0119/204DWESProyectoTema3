<!DOCTYPE html>
<html lang="en">
    <!--
        Autor: Manuel Martín Alonso.
        Utilidad: Este programa consiste en crear e inicializar un array con el sueldo percibido de lunes a domingo utilizando funciones.
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
                16. Recorrer el array anterior utilizando funciones para obtener el mismo resultado.
            </h2>
        </div>
        <?php
            //Declaramos e inicializamos un array con los días de la semana y le asignamos el sueldo diario.
            $aSueldoSemana = [
                "lunes" => 20,
                "martes" => 20,
                "miercoles" => 20,
                "jueves" => 20,
                "viernes" => 20,
                "sabado" => 0,
                "domingo" => 0];
            //Declaramos e inicializamos una variable acumulador.
            $totalSueldoSemanal=0;
            reset($aSueldoSemana);
            /*Recorremos el array con un while imprimiendo el dia de la semana y el sueldo diario. 
            Además, acumularemos los valores de cada día y luego los imprimiremos por pantalla.*/
            while (is_numeric(current($aSueldoSemana))) {
                print "El sueldo percibido el " . key($aSueldoSemana) . " es " . current($aSueldoSemana) . "€ <br/>";
                $totalSueldoSemanal+=current($aSueldoSemana);
                next($aSueldoSemana);
            }
            print("El sueldo percibido en la semana es de: $totalSueldoSemanal");
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

