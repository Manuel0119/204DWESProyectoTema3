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
                17. Inicializar un array (bidimensional con dos índices numéricos) donde almacenamos el nombre de las personas que tienen reservado el asiento en un teatro de 20 filas y 15 asientos por fila. (Inicializamos el array ocupando únicamente 5 asientos). Recorrer el array con distintas técnicas (foreach(), while(), for()) para mostrar los asientos ocupados en cada fila y las personas que lo ocupan.
            </h2>
        </div>
        <?php
        /**
         *  @author Manuel Martín Alonso
         *  @version 1.0
         *  ultima actualizacion 12-12-2022
         */
        $aTeatro = [[]];
        for ($iFila = 1; $iFila <= 20; $iFila++) {
            for ($iColumna = 1; $iColumna <= 15; $iColumna++) {
                $aTeatro[$iFila][$iColumna] = null;
            }
        }
        $aTeatro[1][1] = "Luis";
        $aTeatro[20][15] = "Alejandro";
        $aTeatro[10][10] = "Ricardo";
        $aTeatro[6][8] = "Josué";
        $aTeatro[9][11] = "Manuel";
        print '<table style="width: 80%; margin: 80px;">';
        print '<tr><th colspan=16>foreach</th></tr>';
        foreach ($aTeatro as $aFila) {
            print("<tr>");
            printf("<td>Pasillo %d</td>", $aFila);
            foreach ($aFila as $asiento) {
                print("<td>$asiento</td>");
            }
            print("</tr>");
        }
        print '<tr><th colspan=16>for</th></tr>';
        for ($index = 1; $index < count($aTeatro); $index++) {
            printf("<tr><td>Pasillo %d</td>", $index);
            for ($index1 = 1; $index1 <= count($aTeatro[1]); $index1++) {
                print("<td>" . $aTeatro[$index][$index1] . "</td>");
            }
            print'</tr>';
        }
        print '<tr><th colspan=16>while</th></tr>';
        reset($aTeatro);
        $fila = 1;

        while ($fila <= 20) {
            $columna = 1;
            printf("<tr><td>Pasillo %d</td>", $fila);
            while ($columna <= 15) {
                printf("<td>%s</td>", $aTeatro[$fila][$columna]);
                $columna++;
            }
            $fila++;
        }
        print"</table>"
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

