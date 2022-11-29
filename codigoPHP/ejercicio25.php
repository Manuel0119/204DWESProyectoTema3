<!DOCTYPE html>
<html lang="en">
    <!--
        Autor: Manuel Martín Alonso.
        Utilidad: Este programa consiste en construir un formulario como plantilla.
        Fecha-última-revisión: 21-11-2022.
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
                width: 100px;
            }
            .container{
                display: flex;
                justify-content: center;
                margin: 2em;
                margin-bottom: 4rem;
                overscroll-behavior-y: initial;
            }
            .encabezado{
                justify-content: center;
            }
            .formulario tr td:nth-child(2) input{
                background-color: yellow;
            }
        </style>
    </head>
    <body>
        <div class="encabezado">
            <h2>
                Plantilla de formularios
            </h2>
        </div>
        <div class="container">
            <?php
            //Incluir la librería de validación.
            require_once '../core/221024ValidacionFormularios.php';
            $entradaOk = true; //Declaración de una variable boolena inicializandola a true.
            //Declaración e inicialización de un array de errores que recogerá los diferentes errores en la validación.
            $aErrores = [
                //Alfabético
                "alfabeticoObligatorio" => null,
                "alfabeticoOpcional" => null,
                //Alfanumérico
                "alfanumericoObligatorio" => null,
                "alfanumericoOpcional" => null,
                //Numérico
                "numericoObligatorio" => null,
                "numericoOpcional" => null,
                //Float
                "floatObligatorio" => null,
                "floatOpcional" => null,
                //Email
                "emailObligatorio" => null,
                "emailOpcional" => null,
                //Contraseña
                "contrasenaObligatoria" => null,
                "contrasenaOpcional" => null,
                //Fecha
                "fechaObligatoria" => null,
                "fechaOpcional" => null,
                //Teléfono
                "telefonoObligatorio" => null,
                "telefonoOpcional" => null,
                //DNI
                "dniObligatorio" => null,
                "dniOpcional" => null,
                //Codigo Postal
                "codigoPostalObligatorio" => null,
                "codigoPostalOpcional" => null
            ];
            //Declaración e inicialización de un array que recoge las respuestas del formulario
            $aRespuestas = [
                //Alfabético
                "alfabeticoObligatorio" => null,
                "alfabeticoOpcional" => null,
                //Alfanumérico
                "alfanumericoObligatorio" => null,
                "alfanumericoOpcional" => null,
                //Numérico
                "numericoObligatorio" => null,
                "numericoOpcional" => null,
                //Float
                "floatObligatorio" => null,
                "floatOpcional" => null,
                //Email
                "emailObligatorio" => null,
                "emailOpcional" => null,
                //Contraseña
                "contrasenaObligatoria" => null,
                "contrasenaOpcional" => null,
                //Fecha
                "fechaObligatoria" => null,
                "fechaOpcional" => null,
                //Teléfono
                "telefonoObligatorio" => null,
                "telefonoOpcional" => null,
                //DNI
                "dniObligatorio" => null,
                "dniOpcional" => null,
                //Código Postal
                "codigoPostalObligatorio" => null,
                "codigoPostalOpcional" => null
            ];
            $ofechaActual = new DateTime();
            $fechaFormateada = date_format($ofechaActual, "Y-m-d");
            //Comprobar si se ha enviado el formulario.
            if (isset($_REQUEST['enviar'])) {
                //Alfabético
                $aErrores['alfabeticoObligatorio'] = validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoObligatorio'], 1000, 1, 1); //Alfabético obligatorio
                $aErrores['alfabeticoOpcional'] = validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoOpcional']); //Alfabético opcional
                //Alfanumérico
                $aErrores['alfanumericoObligatorio'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoObligatorio'], 1000, 1, 1); //Alfanumérico obligatorio
                $aErrores['alfanumericoOpcional'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoOpcional']); //Alfanumérico opcional
                //Numérico
                $aErrores['numericoObligatorio'] = validacionFormularios::comprobarEntero($_REQUEST['numericoObligatorio'], PHP_INT_MAX, -PHP_INT_MAX, 1); //Numérico obligatorio
                $aErrores['numericoOpcional'] = validacionFormularios::comprobarEntero($_REQUEST['numericoOpcional']); //Numérico opcional
                //Float
                $aErrores['floatObligatorio'] = validacionFormularios::comprobarFloat($_REQUEST['floatObligatorio'], PHP_INT_MAX, -PHP_INT_MAX, 1); //Float obligatorio
                $aErrores['floatOpcional'] = validacionFormularios::comprobarFloat($_REQUEST['floatOpcional']); //Float opcional
                //Email
                $aErrores['emailObligatorio'] = validacionFormularios::validarEmail($_REQUEST['emailObligatorio'], 1); //Email obligatorio
                $aErrores['emailOpcional'] = validacionFormularios::validarEmail($_REQUEST['emailOpcional']); //Email opcional
                //Contraseña
                $aErrores['contrasenaObligatoria'] = validacionFormularios::validarPassword($_REQUEST['contrasenaObligatoria']); //Contraseña obligatorio
                $aErrores['contrasenaOpcional'] = validacionFormularios::validarPassword($_REQUEST['contrasenaOpcional'], 16, 2, 3, 0); //Contraseña opcional
                //Fecha
                $aErrores['fechaObligatoria'] = validacionFormularios::validarFecha($_REQUEST['fechaObligatoria'], $fechaFormateada, "01/01/1900", 1); //Fecha obligatorio
                $aErrores['fechaOpcional'] = validacionFormularios::validarFecha($_REQUEST['fechaOpcional'], $fechaFormateada); //Fecha opcional
                //Teléfono
                $aErrores['telefonoObligatorio'] = validacionFormularios::validarTelefono($_REQUEST['telefonoObligatorio'], 1); //Teléfono obligatorio
                $aErrores['telefonoOpcional'] = validacionFormularios::validarTelefono($_REQUEST['telefonoOpcional']); //Teléfono opcional
                //DNI
                $aErrores['dniObligatorio'] = validacionFormularios::validarDni($_REQUEST['dniObligatorio'], 1); //DNI obligatorio
                $aErrores['dniOpcional'] = validacionFormularios::validarDni($_REQUEST['dniOpcional']); //DNI opcional
                //Código Postal
                $aErrores['codigoPostalObligatorio'] = validacionFormularios::validarCp($_REQUEST['codigoPostalObligatorio'], 1); //Codifgo Postal obligatorio
                $aErrores['codigoPostalOpcional'] = validacionFormularios::validarCp($_REQUEST['codigoPostalOpcional']); //Codigo Postal opcional
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
                //Alfabético
                $aRespuestas['alfabeticoObligatorio'] = $_REQUEST['alfabeticoObligatorio'];
                $aRespuestas['alfabeticoOpcional'] = $_REQUEST['alfabeticoOpcional'];
                //Alfanumérico
                $aRespuestas['alfanumericoObligatorio'] = $_REQUEST['alfanumericoObligatorio'];
                $aRespuestas['alfanumericoOpcional'] = $_REQUEST['alfanumericoOpcional'];
                //Numérico
                $aRespuestas['numericoObligatorio'] = $_REQUEST['numericoObligatorio'];
                $aRespuestas['numericoOpcional'] = $_REQUEST['numericoOpcional'];
                //Float
                $aRespuestas['floatObligatorio'] = $_REQUEST['floatObligatorio'];
                $aRespuestas['floatOpcional'] = $_REQUEST['floatOpcional'];
                //Email
                $aRespuestas['emailObligatorio'] = $_REQUEST['emailObligatorio'];
                $aRespuestas['emailOpcional'] = $_REQUEST['emailOpcional'];
                //Contraseña
                $aRespuestas['contrasenaObligatoria'] = $_REQUEST['contrasenaObligatoria'];
                $aRespuestas['contrasenaOpcional'] = $_REQUEST['contrasenaOpcional'];
                //Fecha
                $aRespuestas['fechaObligatoria'] = $_REQUEST['fechaObligatoria'];
                $aRespuestas['fechaOpcional'] = $_REQUEST['fechaOpcional'];
                //Teléfono
                $aRespuestas['telefonoObligatorio'] = $_REQUEST['telefonoObligatorio'];
                $aRespuestas['telefonoOpcional'] = $_REQUEST['telefonoOpcional'];
                //DNI
                $aRespuestas['dniObligatorio'] = $_REQUEST['dniObligatorio'];
                $aRespuestas['dniOpcional'] = $_REQUEST['dniOpcional'];
                //Código Postal
                $aRespuestas['codigoPostalObligatorio'] = $_REQUEST['codigoPostalObligatorio'];
                $aRespuestas['codigoPostalOpcional'] = $_REQUEST['codigoPostalOpcional'];
                //Creacion de una tabla para imprimir los valores introducidos por el usuario.
                echo '<table style="width: 24%;">';
                echo '<th style="text-align: center;" colspan="2">' . "Datos Insertados" . "</th>";
                foreach ($aRespuestas as $claveRespuesta => $valorRespuesta) {
                    echo '<tr>';
                    if (!empty($valorRespuesta)) {
                        echo '<td style="text-align: center;">' . $claveRespuesta . ":" . "</td>";
                        echo '<td>' . $valorRespuesta . "</td>";
                    }
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                ?>
                <!-- Creación de un formulario que solicita datos al usuario. -->
                <form name="ejercicio25" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <table class="formulario">
                    <!-- Alfabético -->
                        <tr>
                            <td rowspan="3"><label>Alfabético:</label></td>
                            <td><input type="text" name="alfabeticoObligatorio" class="entradadatos" value="<?php echo $_REQUEST['alfabeticoObligatorio'] ?? ''; ?>"/></td><!-- Alfabético Obligatorio -->
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores['alfabeticoObligatorio'] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="alfabeticoOpcional" class="entradadatos" value="<?php echo $_REQUEST['alfabeticoOpcional'] ?? ''; ?>"/></td><!-- Alfabético Opcional -->
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores['alfabeticoOpcional'] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="alfabeticoBloqueado" class="entradadatos" disabled/></td><!-- Alfabético Bloqueado -->
                            <td></td>
                        </tr>
                    <!-- Alfanumértico -->
                        <tr>
                            <td rowspan="3"><label>Alfanumérico:</label></td>
                            <td><input type="text" name="alfanumericoObligatorio" class="entradadatos" value="<?php echo $_REQUEST['alfanumericoObligatorio'] ?? ''; ?>"/></td><!-- Alfanumérico Obligatorio -->
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores['alfanumericoObligatorio'] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="alfanumericoOpcional" class="entradadatos" value="<?php echo $_REQUEST['alfanumericoOpcional'] ?? ''; ?>"/></td><!-- Alfanumérico Opcional -->
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores['alfanumericoOpcional'] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="alfanumericoBloqueado" class="entradadatos" disabled/></td><!-- Alfanumérico Bloqueado -->
                            <td></td>
                        </tr>
                    <!-- Numérico -->
                        <tr>
                            <td rowspan="3"><label>Entero:</label></td>
                            <td><input type="text" name="numericoObligatorio" class="entradadatos" value="<?php echo $_REQUEST['numericoObligatorio'] ?? ''; ?>"/></td><!-- Numérico Obligatorio -->
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores['numericoObligatorio'] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="numericoOpcional" class="entradadatos" value="<?php echo $_REQUEST['numericoOpcional'] ?? ''; ?>"/></td><!-- Numérico Opcional -->
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores['numericoOpcional'] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="numericoBloqueado" class="entradadatos" disabled/></td><!-- Numérico Bloqueado -->
                            <td></td>
                        </tr>
                    <!-- Float -->
                        <tr>
                            <td rowspan="3"><label>Float:</label></td>
                            <td><input type="text" name="floatObligatorio" class="entradadatos" value="<?php echo $_REQUEST['floatObligatorio'] ?? ''; ?>"/></td><!-- Float Obligatorio -->
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores['floatObligatorio'] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="floatOpcional" class="entradadatos" value="<?php echo $_REQUEST['floatOpcional'] ?? ''; ?>"/></td><!-- Float Opcional -->
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores['floatOpcional'] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="floatBloqueado" class="entradadatos" disabled/></td><!-- Float Bloqueado -->
                            <td></td>
                        </tr>
                    <!-- Email -->
                        <tr>
                            <td rowspan="3"><label>Email:</label></td>
                            <td><input type="text" name="emailObligatorio" class="entradadatos" value="<?php echo $_REQUEST['emailObligatorio'] ?? ''; ?>"/></td><!-- Email Obligatorio -->
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores['emailObligatorio'] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="emailOpcional" class="entradadatos" value="<?php echo $_REQUEST['emailOpcional'] ?? ''; ?>"/></td><!-- Email Opcional -->
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores['emailOpcional'] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="emailBloqueado" class="entradadatos" disabled/></td><!-- Email Bloqueado -->
                            <td></td>
                        </tr>
                    <!-- Password -->
                        <tr>
                            <td rowspan="3"><label>Contraseña:</label></td>
                            <td><input type="password" name="contrasenaObligatoria" class="entradadatos" value="<?php echo $_REQUEST['contrasenaObligatoria'] ?? ''; ?>"/></td><!-- Contrasena Obligatorio -->
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores['contrasenaObligatoria'] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="contrasenaOpcional" class="entradadatos" value="<?php echo $_REQUEST['contrasenaOpcional'] ?? ''; ?>"/></td><!-- Contrasena Opcional -->
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores['contrasenaOpcional'] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="contrasenaBloqueado" class="entradadatos" disabled/></td><!-- Contrasena Bloqueado -->
                            <td></td>
                        </tr>
                    <!-- Fecha -->
                        <tr>
                            <td rowspan="3"><label>Fecha:</label></td>
                            <td><input type="text" name="fechaObligatoria" class="entradadatos" value="<?php echo $_REQUEST['fechaObligatoria'] ?? ''; ?>"/></td><!-- Fecha Obligatoria -->
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores['fechaObligatoria'] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="fechaOpcional" class="entradadatos" value="<?php echo $_REQUEST['fechaOpcional'] ?? ''; ?>"/></td><!-- Fecha Opcional -->
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores['fechaOpcional'] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="fechaBloqueado" class="entradadatos" disabled/></td><!-- Fecha Bloqueado -->
                            <td></td>
                        </tr>
                    <!-- Teléfono -->
                        <tr>
                            <td rowspan="3"><label>Teléfono:</label></td>
                            <td><input type="text" name="telefonoObligatorio" class="entradadatos" value="<?php echo $_REQUEST['telefonoObligatorio'] ?? ''; ?>"/></td><!-- Teléfono Obligatorio -->
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores['telefonoObligatorio'] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="telefonoOpcional" class="entradadatos" value="<?php echo $_REQUEST['telefonoOpcional'] ?? ''; ?>"/></td><!-- Teléfono Opcional -->
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores['telefonoOpcional'] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="telefonoBloqueado" class="entradadatos" disabled/></td><!-- Teléfono Bloqueado -->
                            <td></td>
                        </tr>
                    <!-- DNI -->
                        <tr>
                            <td rowspan="3"><label>DNI:</label></td>
                            <td><input type="text" name="dniObligatorio" class="entradadatos" value="<?php echo $_REQUEST['dniObligatorio'] ?? ''; ?>"/></td><!-- DNI Obligatorio -->
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores['dniObligatorio'] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="dniOpcional" class="entradadatos" value="<?php echo $_REQUEST['dniOpcional'] ?? ''; ?>"/></td><!-- DNI Opcional -->
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores['dniOpcional'] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="dniBloqueado" class="entradadatos" disabled/></td><!-- DNI Bloqueado -->
                            <td></td>
                        </tr>
                    <!-- Código Postal -->
                        <tr>
                            <td rowspan="3"><label>Codigo Postal:</label></td>
                            <td><input type="text" name="codigoPostalObligatorio" class="entradadatos" value="<?php echo $_REQUEST['codigoPostalObligatorio'] ?? ''; ?>"/></td><!-- Codigo Postal Obligatorio -->
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores['codigoPostalObligatorio'] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="codigoPostalOpcional" class="entradadatos" value="<?php echo $_REQUEST['codigoPostalOpcional'] ?? ''; ?>"/></td><!-- Codigo Postal Opcional -->
                            <!--Mostrar los errores.-->
                            <td><?php echo '<span style="color: red;">' . $aErrores['codigoPostalOpcional'] . '</span>' . "<br><br>"; ?></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="codigoPostalBloqueado" class="entradadatos" disabled/></td><!-- Codigo Postal Bloqueado -->
                            <td></td>
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

