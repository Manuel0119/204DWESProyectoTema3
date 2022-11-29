<!DOCTYPE html>
<html lang="en">
    <!--
        Autor: Manuel Martín Alonso.
        Utilidad: Este programa consiste en construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
                  recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente, pero las
                  respuestas que habíamos tecleado correctamente aparecerán en el formulario y no tendremos que volver a teclearlas.
        Fecha-última-revisión: 17-11-2022.
    -->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ManuelMartínAlonso</title>
        <link rel="stylesheet" href="../webroot/css/estilos.css">
        <link rel="icon" type="image/ico" sizes="32x32" href="../webroot/favicon.ico">
        <style>
            .formulario{
                border: none;
            }
            .formulario tr, .formulario td{
                border: none;
            }
            .formulario td{
                text-align: center;
                width: 150px;
            }
            .formulario td:nth-child(3){
                display: flex;
                align-items: center;
            }
            .formulario td:nth-child(1){
                text-align: left;
                width: 240px;
            }
            .container{
                display: flex;
                justify-content: center;
            }
            
        </style>
    </head>
    <body>
        <div class="encabezado">
            <h2>
                25. Trabajar en PlantillaFormulario.php mi plantilla para hacer formularios como churros.
            </h2>
        </div>
        <div class="container">
            <?php
            //Incluir la librería de validación.
            require_once '../core/221024ValidacionFormularios.php';
            $entradaOk = true; //Declaración de una variable boolena inicializandola a true.
            //Declaración e inicialización de un array de errores que recogerá los diferentes errores en la validación.
            $aErrores = [
                "alfabeticoObligatorio" => null,
                "alfabeticoOpcional" => null,
                "alfabeticoBloqueado" => null,
                "alfanumericoObligatorio" => null,
                "alfanumericoOpcional" => null,
                "alfanumericoBloqueado" => null,
                "numericoObligatorio" => null,
                "numericoOpcional" => null,
                "numericoBloqueado" => null,
                "correoObligatorio" => null,
                "correoOpcional" => null,
                "correoBloqueado" => null,
                "contrasenaObligatorio" => null,
                "contrasenaOpcional" => null,
                "contrasenaBloqueado" => null,
                "telefonoObligatorio" => null,
                "telefonoOpcional" => null,
                "telefonoBloqueado" => null,
                "fechaObligatorio" => null,
                "fechaOpcional" => null,
                "fechaBloqueada" => null,
                "codigopostalObligatorio" => null,
                "codigopostalOpcional" => null,
                "codigopostalBloqueado" => null
            ];
            //Declaración e inicialización de un array que recoge las respuestas del formulario
            $aRespuestas = [
                "alfabeticoObligatorio" => null,
                "alfabeticoOpcional" => null,
                "alfabeticoBloqueado" => null,
                "alfanumericoObligatorio" => null,
                "alfanumericoOpcional" => null,
                "alfanumericoBloqueado" => null,
                "numericoObligatorio" => null,
                "numericoOpcional" => null,
                "numericoBloqueado" => null,
                "correoObligatorio" => null,
                "correoOpcional" => null,
                "correoBloqueado" => null,
                "contrasenaObligatorio" => null,
                "contrasenaOpcional" => null,
                "contrasenaBloqueado" => null,
                "telefonoObligatorio" => null,
                "telefonoOpcional" => null,
                "telefonoBloqueado" => null,
                "fechaObligatorio" => null,
                "fechaOpcional" => null,
                "fechaBloqueada" => null,
                "codigopostalObligatorio" => null,
                "codigopostalOpcional" => null,
                "codigopostalBloqueado" => null
            ];
            $ofechaActual= new DateTime();
            $fechaFormateada= date_format($ofechaActual, "Y-m-d");
            //Comprobar si se ha enviado el formulario.
            if (isset($_REQUEST['enviar'])) {
                $aErrores['alfabeticoObligatorio']= validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoObligatorio'], 1000, 1, 1);
                $aErrores['alfabeticoOpcional']= validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoOpcional'], 1000, 1);
                $aErrores['alfanumericoObligatorio']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoObligatorio'], $maxTamanio, $minTamanio, $entradaOk);
                $aErrores["Nombre"] = validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'], 45, 1, 1); //Validación del nombre.
                $aErrores["Apellidos"] = validacionFormularios::comprobarAlfabetico($_REQUEST['apellidos'], 50, 1, 1); //Validación de los apellidos.
                $aErrores["Altura"] = validacionFormularios::comprobarEntero($_REQUEST['altura'], 280, 0); //Validación de la altura.
                $aErrores["Email"] = validacionFormularios::validarEmail($_REQUEST['email'], 1); //Validación del email.
                $aErrores["Contrasena"] = validacionFormularios::validarPassword($_REQUEST['contrasena'],16,2,3,1); //Validación de la contraseña.
                $aErrores["Tel"] = validacionFormularios::validarTelefono($_REQUEST['tel'], 0); //Validación del numero de telefono.
                $aErrores["CP"] = validacionFormularios::validarCp($_REQUEST['cp']); //Validación del codigo postal.
                $aErrores["FechaNacimiento"] = validacionFormularios::validarFecha($_REQUEST['fechaNacimiento'], $fechaFormateada,"01/01/1900",1);//Validación de la fecha de nacimiento.
                //Recorrer el array de errores comprobando cada uno de los campos del formulario, asignándole false a la variable booleana si uno de los campos no es correcto.
                foreach ($aErrores as $claveError => $mensajeError) {
                    if ($mensajeError != null) {
                        $entradaOk = false;
                        $_REQUEST[$claveError] = ''; //Borrar los campos malos.
                    }
                };
            } else {
                $entradaOk = false; //Si no ha pulsado el botón de enviar la validación es incorrecta.
            }
            //Si la validación es correcta imprime las respuestas.
            if ($entradaOk) {
                $aRespuestas["Nombre"] = $_REQUEST['nombre'];
                $aRespuestas["Apellidos"] = $_REQUEST['apellidos'];
                $aRespuestas["Altura"] = $_REQUEST['altura'];
                $aRespuestas["Email"] = $_REQUEST['email'];
                $aRespuestas["Contrasena"] = $_REQUEST['contrasena'];
                $aRespuestas["Tel"] = $_REQUEST['tel'];
                $aRespuestas["CP"] = $_REQUEST['cp'];
                $aRespuestas["FechaNacimiento"] = $_REQUEST['fechaNacimiento'];
                echo '<table style="width: 24%;">';
                echo '<th style="text-align: center;" colspan="2">'."Datos Insertados"."</th>";
                foreach ($aRespuestas as $claveRespuesta => $valorRespuesta) {
                    echo '<tr>';
                    if (!empty($valorRespuesta)) {
                        echo '<td style="text-align: center;">'.$claveRespuesta.":"."</td>";
                        echo '<td>'.$valorRespuesta."</td>";
                    }
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                ?>
                <!-- Creación de un formulario que solicita al usuario el nombre y la altura y le muestra un error en el campo si la validación es incorrecta. -->
                <form name="ejercicio24" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <table class="formulario">
                        <tr>
                            <td><label for="nombre">*Nombre:</label></td>
                            <td><input type="text" name="nombre" class="entradadatos" value="<?php echo $_REQUEST['nombre'] ?? ''; ?>"/></td><!-- Nombre del usuario. -->
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores["Nombre"] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center" colspan="3"><input type="submit" style="width: 6rem;height: 2rem;" name="enviar" value="Enviar"/></td><!-- Botón de enviar. -->
                        </tr>
                    </table>
                </form>
            <?php } ?>
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

