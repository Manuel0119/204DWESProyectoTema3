<!DOCTYPE html>
<html lang="en">
    <!--
        Autor: Manuel Martín Alonso.
        Utilidad: Este programa consiste en mostrar el contenido de las variables superglobales utilizando print_r() y foreach().
        Fecha-última-revisión: 23-11-2022.
    -->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ManuelMartínAlonso</title>
        <link rel="stylesheet" href="../webroot/css/estilos.css">
        <link rel="icon" type="image/ico" sizes="32x32" href="../webroot/favicon.ico">
    </head>
    <body style="text-align: -webkit-center;">
        <div class="encabezado">
            <h2>12. Mostrar el contenido de las variables superglobales (utilizando print_r() y foreach()).</h2>
        </div>
        <!--$_SERVER-->
        <table class="tablaMostrar">
            <?php
            //Comprobación de que la variable no sea null o vacia.
            if (is_null($_SERVER) || empty($_SERVER)) {
                print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_SERVER está vacía</th></thead>';
            } else {
                //Recorremos la variable imprimiendo la clave y el valor del array.
                echo '<th colspan="2" style="background: #CCC;">$_SERVER';
                foreach ($_SERVER as $clave => $valor) {
                    print("<tr>");
                    printf("<td>%s</td><td>%s</td>", $clave, $valor);
                    print("</tr>");
                }
            }
            echo '</th>';
            ?>
        </table>
        <!--$GLOBALS-->
        <table class="tablaMostrar">
            <?php
            //Comprobación de que la variable no sea null o vacia.
            if (is_null($GLOBALS) || empty($GLOBALS)) {
                print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_SERVER está vacía</th></thead>';
            } else {
                //Recorremos la variable imprimiendo la clave y el valor del array.
                echo '<th colspan="2" style="background: #CCC;">$GLOBALS';
                foreach ($GLOBALS as $clave => $valor) {
                    if ($clave == '_SERVER') {
                        print("<tr>");
                        print '<td>';
                        print_r($clave);
                        print '</td>';
                        print '<td>';
                        echo '<table>';
                        foreach ($_SERVER as $claveServer => $valorServer) {
                            echo '<tr>';
                            print '<td>';
                            print_r($claveServer);
                            print '</td>';
                            print '<td>';
                            print_r($valorServer);
                            print '</td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                        print '</td>';
                    } else {
                        print("<tr>");
                        print '<td>';
                        print_r($clave);
                        print '</td>';
                        print '<td>';
                        print_r($valor);
                        print '</td>';
                    }
                    print("</tr>");
                }
            }
            echo '</th>';
            ?>
        </table>
        <!--$_SESSION-->
        <table class="tablaMostrar">
            <?php
            //Comprobación de que la variable no sea null o vacia.
            if (is_null($_SESSION) || empty($_SESSION)) {
                print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_SESSION está vacía</th></thead>';
            } else {
                //Recorremos la variable imprimiendo la clave y el valor del array.
                echo '<th colspan="2" style="background: #CCC;">$_SESSION';
                foreach ($_SESSION as $clave => $valor) {
                    print("<tr>");
                    printf("<td>%s</td><td>%s</td>", $clave, $valor);
                    print("</tr>");
                }
            }
            echo '</th>';
            ?>
        </table>
        <!--$_COOKIE-->
        <table class="tablaMostrar">
            <?php
            //Comprobación de que la variable no sea null o vacia.
            if (is_null($_COOKIE) || empty($_COOKIE)) {
                print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_COOKIE está vacía</th></thead>';
            } else {
                //Recorremos la variable imprimiendo la clave y el valor del array.
                echo '<th colspan="2" style="background: #CCC;">$_COOKIE';
                foreach ($_COOKIE as $clave => $valor) {
                    print("<tr>");
                    printf("<td>%s</td><td>%s</td>", $clave, $valor);
                    print("</tr>");
                }
            }
            echo '</th>';
            ?>
        </table>
        <!--$_FILES-->
        <table class="tablaMostrar">
            <?php
            //Comprobación de que la variable no sea null o vacia.
            if (is_null($_FILES) || empty($_FILES)) {
                print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_FILES está vacía</th></thead>';
            } else {
                //Recorremos la variable imprimiendo la clave y el valor del array.
                echo '<th colspan="2" style="background: #CCC;">$_FILES';
                foreach ($_FILES as $clave => $valor) {
                    print("<tr>");
                    printf("<td>%s</td><td>%s</td>", $clave, $valor);
                    print("</tr>");
                }
            }
            echo '</th>';
            ?>
        </table>
        <!--$_POST-->
        <table class="tablaMostrar">
            <?php
            //Comprobación de que la variable no sea null o vacia.
            if (is_null($_POST) || empty($_POST)) {
                print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_POST está vacía</th></thead>';
            } else {
                //Recorremos la variable imprimiendo la clave y el valor del array.
                echo '<th colspan="2" style="background: #CCC;">$_POST';
                foreach ($_POST as $clave => $valor) {
                    print("<tr>");
                    printf("<td>%s</td><td>%s</td>", $clave, $valor);
                    print("</tr>");
                }
            }
            echo '</th>';
            ?>
        </table>
        <!--$_GET-->
        <table class="tablaMostrar">
            <?php
            //Comprobación de que la variable no sea null o vacia.
            if (is_null($_GET) || empty($_GET)) {
                print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_GET está vacía</th></thead>';
            } else {
                //Recorremos la variable imprimiendo la clave y el valor del array.
                echo '<th colspan="2" style="background: #CCC;">$_GET';
                foreach ($_GET as $clave => $valor) {
                    print("<tr>");
                    printf("<td>%s</td><td>%s</td>", $clave, $valor);
                    print("</tr>");
                }
            }
            echo '</th>';
            ?>
        </table>
        <!--$_REQUEST-->
        <table class="tablaMostrar">
            <?php
            //Comprobación de que la variable no sea null o vacia.
            if (is_null($_REQUEST) || empty($_REQUEST)) {
                print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_REQUEST está vacía</th></thead>';
            } else {
                //Recorremos la variable imprimiendo la clave y el valor del array.
                echo '<th colspan="2" style="background: #CCC;">$_REQUEST';
                foreach ($_REQUEST as $clave => $valor) {
                    print("<tr>");
                    printf("<td>%s</td><td>%s</td>", $clave, $valor);
                    print("</tr>");
                }
            }
            echo '</th>';
            ?>
        </table>
        <!--$_ENV-->
        <table class="tablaMostrar">
            <?php
            //Comprobación de que la variable no sea null o vacia.
            if (is_null($_ENV) || empty($_ENV)) {
                print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_ENV está vacía</th></thead>';
            } else {
                //Recorremos la variable imprimiendo la clave y el valor del array.
                echo '<th colspan="2" style="background: #CCC;">$_ENV';
                foreach ($_ENV as $clave => $valor) {
                    print("<tr>");
                    printf("<td>%s</td><td>%s</td>", $clave, $valor);
                    print("</tr>");
                }
            }
            echo '</th>';
            ?>
        </table>
        <a href="../indexProyectoTema3.php"><img style="padding: 0em;" src="../webroot/volver.png" alt="volver" class="volver2"/></a>
        <footer style="position: inherit;">
            <div><a href="../indexProyectoTema3.php"><img style="padding: 0em 1em;" src="../webroot/logo_propio.png" alt="logo" id="logo"></a></div>
            2022-23 Manuel Martín Alonso. ©Todos los derechos reservados.
            <a href="https://github.com/Manuel0119" target="_blank"><img src="../webroot/github-logo.png" alt="github" id="g"></a>
            <a href="doc/CV - Manuel Martín Alonso.pdf" target="_blank"><img src="../webroot/curriculum-logo.png" alt="curriculum" id="curricu"></a>
        </footer>
    </body>
</html>

