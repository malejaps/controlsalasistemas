<div id="contenido">
    <?php
    $contrasenaVieja = array(
        'name' => 'contVieja',
        'id' => 'contVieja',
        'value' => ''
    );
    $contrasenaNueva = array(
        'name' => 'contNueva',
        'id' => 'contNueva',
        'value' => ''
    );
    $contrasenaNueva2 = array(
        'name' => 'contNueva2',
        'id' => 'contNueva2',
        'value' => ''
    );
    
    $boton = array(
        'name' => 'confirmarCont',
        'id' => 'confirmarCont',
        'content' => 'Confimar'
    );
    
    $formulario = array(
        'id' => 'fomularioContrasena',
        'name' => 'fomularioContrasena'
    );
    ?>
    <?php echo form_open('inicioAdministrador/contrasenaAdminCambiada', $formulario); ?>
    <div class="intertitulobase2">Cambiar contrase&ntilde;a administrador</div>
    <br/>
    <div id="formulario">
    <table>
        <tbody>
            <tr>
                <td><label>Contrase&ntilde;a actual:</label> </td>
                <td><?php echo form_password($contrasenaVieja); ?></td>
                <td><div id="contrasenaActual"></td>
            </tr>
            <tr>
                <td><label>Contrase&ntilde;a nueva:</label> </td>
                <td><?php echo form_password($contrasenaNueva); ?></td>
                <td><div id="contrasenaNueva"></td>
            </tr>
            <tr>
                <td><label>Repita la contrase&ntilde;a nueva:</label> </td>
                <td><?php echo form_password($contrasenaNueva2); ?></td>
                <td><div id="contrasenaNueva2"></td>
            </tr>
        </tbody>
    </table>
    <?php
    echo form_button($boton);
    echo form_close();    
    ?><div class="msjerror"><?php echo validation_errors();?></div>
         </div>

</div>