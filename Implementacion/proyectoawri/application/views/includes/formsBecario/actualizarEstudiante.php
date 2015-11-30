<div id="contenido">
    <?php
    $codigo = array(
        'name' => 'codUsuarioEstudiante',
        'id' => 'codUsuarioEstudiante',
        'value' => ''
    );
    $boton = array(
        'name' => 'actualizarEstudiante',
        'id'   => 'actualizarEstudiante',
        'content' => 'Actualizar'
    );
    $formulario = array(
        'id' => 'formulario',
        'name' => 'formulario'
    );
    ?>
    <?php echo form_open('becarioGestion/actualizarEstudiante', $formulario); ?>
    <div class="intertitulobase2">Actualizar estudiante</div>
    <br/>
    <div id="formulario">
        <table>
            <tbody>

                <tr>
                    <td><label>Usuario:</label></td>
                    <td>
                        <?php echo form_input($codigo); ?>

                    </td>
                    <td>
                        <div id="codigoUsuario" name="codigoUsuario"></div>
                    </td>

                </tr>

                <tr>
                    <td><label>Telefono:</label> </td>           
                    <td><div id="telefono" name="telUsuario"></div></td>
                    <td><div id="errorTelefono" name="telUsuario"></div></td>
                </tr>

                <tr>
                    <td><label>Direccion:</label> </td>
                    <td><div id="direccion" name="dirUsuario"></div></td>
                    <td><div id="errorDireccion" name="dirUsuario"></div></td>
                </tr>
                <tr>
                    <td><label>Correo:</label> </td>
                    <td><div id="correo" name="correoUsuario"></div></td>
                    <td><div id="errorCorreo" name="correoUsuario"></div></td>
                </tr>


            </tbody>
        </table>
        <br/>
        <?php echo form_button($boton); ?><?php
        echo form_close();
        ?><div class="msjerror"><?php echo validation_errors(); ?></div>


    </div>

</div>