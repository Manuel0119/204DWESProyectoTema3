<!DOCTYPE html>
<html lang="en">
    <!--
        Autor: Manuel Martín Alonso.
        Utilidad: Este programa consiste en inicializar variables de los distintos tipos de datos básicos(string, int, float, bool) y mostrar los datos por pantalla (echo, print, printf, print_r, var_dump).
        Fecha-última-revisión: 13-11-2022.
    -->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ManuelMartínAlonso</title>
        <link rel="stylesheet" href="../webroot/css/estilos.css"/>
        <link rel="icon" type="image/ico" sizes="32x32" href="../webroot/favicon.ico">
    </head>
    <body>
        <div class="encabezado">
            <h2>1. Inicializar variables de los distintos tipos de datos básicos(string, int, float, bool) y mostrar los datos por pantalla (echo, print, printf, print_r,var_dump).</h2>
        </div>
        <?php
            //Variable que almacena una cadena.
            $cadena="hola";
            //Variable que almacena un entero.
            $entero=3;
            //Variable que almacena un entero con coma flotante.
            $float=3.2;
            //Variable que almacena un valor booleano.
            $boolean=true;

            //Variables que almacenan el tipo de dato de las variables.
            $tipo=gettype($cadena);
            $tipo2=gettype($entero);
            $tipo3=gettype($float);
            $tipo4=gettype($boolean);
            //Impresión de los distintos tipos de datos de formas diferentes.
            echo "echo<br>";
            echo "La variable <span class='cadena'>\$cadena</span> es de tipo <span class='cadena'>".$tipo."</span> y su valor es de: <span class='cadena'>".$cadena."</span><br>";
            echo "La variable <span class='entero'>\$entero</span> es de tipo <span class='entero'>".$tipo2."</span> y su valor es de: <span class='entero'>".$entero."</span><br>";
            echo "La variable <span class='float'>\$float</span> es de tipo <span class='float'>".$tipo3."</span> y su valor es de: <span class='float'>".$float."</span><br>";
            echo "La variable <span class='boolean'>\$boolean</span> es de tipo <span class='boolean'>".$tipo4."</span> y su valor es de: <span class='boolean'>".$boolean."</span><br>";
            echo "print<br>";
            print "La variable <span class='cadena'>\$cadena</span> es de tipo <span class='cadena'>".$tipo."</span> y su valor es de: <span class='cadena'>".$cadena."</span><br>";
            print "La variable <span class='entero'>\$entero</span> es de tipo <span class='entero'>".$tipo2."</span> y su valor es de: <span class='entero'>".$entero."</span><br>";
            print "La variable <span class='float'>\$float</span> es de tipo <span class='float'>".$tipo3."</span> y su valor es de: <span class='float'>".$float."</span><br>";
            print "La variable <span class='boolean'>\$boolean</span> es de tipo <span class='boolean'>".$tipo4."</span> y su valor es de: <span class='boolean'>".$boolean."</span><br>";
            echo "printf<br>";
            printf("La variable <span class='cadena'>\$cadena</span> es de tipo <span class='cadena'>$tipo</span> y su valor es <span class='cadena'>$cadena</span>"."<br>",$cadena);
            printf("La variable <span class='entero'>\$entero</span> es de tipo <span class='entero'>$tipo2</span> y su valor es <span class='entero'>$entero</span>"."<br>",$entero);
            printf("La variable <span class='float'>\$float</span> es de tipo <span class='float'>$tipo3</span> y su valor es <span class='float'>$float</span>"."<br>",$float);
            printf("La variable <span class='boolean'>\$boolean</span> es de tipo <span class='boolean'>$tipo4</span> y su valor es <span class='boolean'>$boolean</span>"."<br>",$boolean);
            echo "print_r<br>";
            print_r("La variable <span class='cadena'>\$cadena</span> es de tipo <span class='cadena'>$tipo</span> y su valor es <span class='cadena'>$cadena</span>"."<br>");
            print_r("La variable <span class='entero'>\$entero</span> es de tipo <span class='entero'>$tipo2</span> y su valor es <span class='entero'>$entero</span>"."<br>");
            print_r("La variable <span class='float'>\$float</span> es de tipo <span class='float'>$tipo3</span> y su valor es <span class='float'>$float</span>"."<br>");
            print_r("La variable <span class='boolean'>\$boolean</span> es de tipo <span class='boolean'>$tipo4</span> y su valor es <span class='boolean'>$boolean</span>"."<br>");
            echo "var_dump()<br>";
            var_dump($cadena);
            printf ("<br>");
            var_dump($entero);
            printf ("<br>");
            var_dump($float);
            printf ("<br>");
            var_dump($boolean);
        ?>
        <a href="../indexProyectoTema3.php"><img src="../webroot/volver.png" alt="volver" class="volver2"/></a>
        <footer>
            <div><a href="../indexProyectoTema3.php"><img src="../webroot/logo_propio.png" alt="logo" id="logo"></a></div>
            2022-23 IES LOS SAUCES. ©Todos los derechos reservados.
            <a href="https://github.com/Manuel0119" target="_blank"><img src="../webroot/github-logo.png" alt="github" id="g"></a>
            <a href="doc/CV - Manuel Martín Alonso.pdf" target="_blank"><img src="../webroot/curriculum-logo.png" alt="curriculum" id="curricu"></a>
        </footer>
    </body>
</html>

