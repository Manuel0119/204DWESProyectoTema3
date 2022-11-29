<!DOCTYPE html>
<html lang="en">
    <!--
        Autor: Manuel Martín Alonso.
        Utilidad: Este programa consiste en construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas recogidas y en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente.
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
                23. Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
                recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente
            </h2>
        </div>
        <div class="codigophp">
            <?php
            //Incluir la librería de validación.
            require_once '../core/221024ValidacionFormularios.php';
            $entradaOk=true;//Declaración de una variable boolena inicializandola a true.
            //Declaración e inicialización de un array de errores que recogerá los diferentes errores en la validación.
            $aErrores=[
                "Nombre"=>"",
                "Altura"=>""
                ];
                //Comprobar si se ha enviado el formulario.
                if (isset($_POST['enviar'])){
                    $aErrores["Nombre"]=validacionFormularios::comprobarAlfabetico($_POST['nombre'],300, 1, 1);//Validación del nombre
                    $aErrores["Altura"]=validacionFormularios::comprobarEntero($_POST['altura'], 280, 0, 1);//Validación de la altura
                    //Recorrer el array de errores comprobando cada uno de los campos del formulario, asignándole false a la variable booleana si uno de los campos no es correcto.
                    foreach ($aErrores as $clave=>$valor){
                        if ($valor!=null) {
                            $entradaOk=false;
                            $_REQUEST[$clave]='';//Borrar los campos malos.
                        }
                    };
                }else{
                    $entradaOk=false;//Si no ha pulsado el botón de enviar la validación es incorrecta.
                }
                //Si la validación es correcta imprime las respuestas.
                if ($entradaOk){
                    $aRespuestas["Nombre"]=$_POST['nombre'];
                    $aRespuestas["Altura"]=$_POST['altura']." cm";
                    foreach ($aRespuestas as $campo=>$valor){
                        print("$campo : $valor <br>");
                    }
                }else{
            ?>
                <!-- Creación de un formulario que solicita al usuario el nombre y la altura y le muestra un error en el campo si la validación es incorrecta. -->
                <form name="ejercicio23" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        <label for="nombre">Nombre:
                            <input type="text" name="nombre" class="entradadatos"/><!-- Nombre del usuario. -->
                            <!--Mostrar los errores.-->
                            <?php echo '<span style="color: red;">'.$aErrores["Nombre"].'</span>'."<br><br>";?>
                        </label>
                        <label for="altura">Altura(cm):
                            <input type="text" name="altura" class="entradadatos"/><!-- Altura del usuario. -->
                            <!--Mostrar los errores.-->
                            <?php echo '<span style="color: red;">'.$aErrores["Altura"].'</span>'."<br><br>";?>
                        </label>
                        <input style="position: fixed; left: 49%;" type="submit" name="enviar" value="Enviar"/><!-- Botón de enviar. -->
                </form>
            <?php }?>
        </div>
        <a href="../indexProyectoTema3.php"><img src="../webroot/volver.png" alt="volver" class="volver2"/></a>
        <footer>
            <div><a href="../indexProyectoTema3.php"><img src="../webroot/logo_propio.png" alt="logo" id="logo"></a></div>
            2022-23 Manuel Martín Alonso. ©Todos los derechos reservados.
            <a href="https://github.com/Manuel0119" target="_blank"><img src="../webroot/github-logo.png" alt="github" id="g"></a>
            <a href="doc/CV - Manuel Martín Alonso.pdf" target="_blank"><img src="../webroot/curriculum-logo.png" alt="curriculum" id="curricu"></a>
        </footer>
    </body>
</html>

