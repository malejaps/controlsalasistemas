<div id="contenido">
    <?php
    $cedula = array(
        'name' => 'cedulaRe',
        'id' => 'cedulaRe',
        'value' => ''
    );
    $boton = array(
        'name' => 'recuperarCont',
        'id' => 'recuperarCont',
        'content' => 'Enviar'
    );
    $formulario = array(
        'id' => 'formRecuperacion',
        'name' => 'formRecuperacion'
    );
    ?>
    <?php echo form_open('recuperarContrasena/enviar', $formulario); ?>
    <div class="intertitulobase2">Recuperar contrase&ntilde;a</div>
    <br/>
    <div id="formulario">
    <table>
        <tbody>
        <td>
            <div id="errorLogin"></div>
        </td>
        <tr>
            <td><label>Ingrese su cedula:</label> </td>
            <td>
                <?php echo form_input($cedula); ?>
            </td>
            <td>
                <div id ="recuperarContrasena"></div>
            </td>
        </tr>
        </tbody>
    </table>
    <?php
    echo form_button($boton);
    echo form_close();
    ?>
        </div>
</div>