<!DOCTYPE html>
<html lang="en">
    <!--
        Autor: Manuel Martín Alonso.
        Utilidad: Este programa consiste en construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
                  recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente, pero las
                  respuestas que habíamos tecleado correctamente aparecerán en el formulario y no tendremos que volver a teclearlas.
        Fecha-última-revisión: 26-11-2022.
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
                width: 150px;
            }
            .container{
                display: flex;
                justify-content: center;
            }
            .codigophp {
                left: 40%;
                margin-top: 17em;
                position: absolute;
            }
            .formulario tr:nth-child(1) input{
                background-color: #F3F391;
            }
        </style>
    </head>
    <body>
        <div class="encabezado">
            <h2>
                24. Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
                recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente, pero las
                respuestas que habíamos tecleado correctamente aparecerán en el formulario y no tendremos que volver a teclearlas.
            </h2>
        </div>
        <div class="codigophp">
            <?php
            //Incluir la librería de validación.
            require_once '../core/221024ValidacionFormularios.php';
            $entradaOk = true; //Declaración de una variable boolena inicializandola a true.
            //Declaración e inicialización de un array de errores que recogerá los diferentes errores en la validación.
            $aErrores = [
                "codigoDepartamento" => null,
                "descripcionDepartamento" => null,
                "fechaBajaDepartamento" => null,
                "fechaAltaDepartamento" => null
            ];
            //Declaración e inicialización de un array de respuestas.
            $aRespuestas = [
                "codigoDepartamento" => null,
                "descripcionDepartamento" => null,
                "fechaBajaDepartamento" => null,
                "fechaAltaDepartamento" => null
            ];
            $ofechaActual = new DateTime();
            $fechaFormateada = date_format($ofechaActual, "Y-m-d");
            //Validación formulario
            if (isset($_REQUEST['enviar'])) {
                $aErrores['codigoDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['codigoDepartamento'], 3, 3, 1);
                $aErrores['descripcionDepartamento'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcionDepartamento'], 255, 1, 0);
                $aErrores['fechaAltaDepartamento'] = validacionFormularios::validarFecha($_REQUEST['fechaAltaDepartamento'], $fechaFormateada);
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
                $aRespuestas['codigoDepartamento'] = $_REQUEST['codigoDepartamento'];
                $aRespuestas['descripcionDepartamento'] = $_REQUEST['descripcionDepartamento'];
                $ofechaFormulario = new DateTime($_REQUEST['fechaAltaDepartamento']);
                $fechaFormularioFormateada = date_format($ofechaFormulario, "d-m-Y");
                $aRespuestas['fechaAltaDepartamento'] = $fechaFormularioFormateada;
                echo '<table>';
                echo '<th style="text-align: center;" colspan="2";>' . "Datos Insertados" . "</th>";
                foreach ($aRespuestas as $claveRespuesta => $valorRespuesta) {
                    echo '<tr>';
                    if (!empty($valorRespuesta)) {
                        echo '<td style="text-align: center;">' . $claveRespuesta . "</td>";
                        echo '<td>' . $valorRespuesta . "</td>";
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
                            <td><label for="codigoDepartamento">CodigoDepartamento:</label></td>
                            <td><input type="text" name="codigoDepartamento" class="entradadatos" value="<?php echo $_REQUEST['codigoDepartamento'] ?? ''; ?>"/></td>
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores["codigoDepartamento"] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td><label for="descripcionDepartamento">DescripciónDepartamento:</label></td>
                            <td><input type="text" name="descripcionDepartamento" class="entradadatos" value="<?php echo $_REQUEST['descripcionDepartamento'] ?? ''; ?>"/></td>
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores["descripcionDepartamento"] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td><label for="fechaBajaDepartamento">FechaBajaDepartamento:</label></td>
                            <td><input type="text" name="fechaBajaDepartamento" class="entradadatos" disabled/></td>
                        </tr>
                        <tr>
                            <td><label for="fechaAltaDepartamento">FechaAltaDepartamento:</label></td>
                            <td><input type="datetime" name="fechaAltaDepartamento" class="entradadatos" value="<?php echo $_REQUEST['fechaAltaDepartamento'] ?? ''; ?>"/></td>
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores["fechaAltaDepartamento"] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center" colspan="3"><input type="submit" style="width: 6rem;height: 2rem;" name="enviar" value="Enviar"/></td>
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

