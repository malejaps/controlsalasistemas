<div id="contenido">
    <?php
    $codigo = array(
        'name' => 'codUsuarioB',
        'id' => 'codUsuarioB',
        'value' => ''
    );
    $boton = array(
        'name' => 'actualizarBecario',
        'id'   => 'actualizarBecario',
        'content' => 'Actualizar'
    );
    $formulario = array(
        'id' => 'fomularioActB',
        'name' => 'formularioActB'
    );
    ?>
    <?php echo form_open('inicioAdministrador/actualizarBecario', $formulario); ?>
    <div class="intertitulobase2">Actualizar becario</div>
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
                        <div id="codigoBec" name="codigoBec"></div>
                    </td>

                </tr>

                <tr>
                    <td><label>Telefono:</label> </td>           
                    <td><div id="telUsuarioB" name="telUsuarioB"></div></td>
                    <td><div id="errorTelefono" name="telUsuario"></div></td>
                </tr>

                <tr>
                    <td><label>Direccion:</label> </td>
                    <td><div id="dirUsuarioB" name="dirUsuarioB"></div></td>
                    <td><div id="errorDireccion" name="dirUsuario"></div></td>
                </tr>
                <tr>
                    <td><label>Correo:</label> </td>
                    <td><div id="correo" name="correo"></div></td>
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