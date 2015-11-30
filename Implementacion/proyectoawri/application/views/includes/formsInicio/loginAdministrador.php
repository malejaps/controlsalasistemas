<div id="contenido">
    <?php
    $cedula = array(
        'name' => 'cedula',
        'id' => 'cedula',
        'value' => ''
    );
    $contrasena = array(
        'name' => 'contrasena',
        'id' => 'contrasena',
        'value' => ''
    );
    $captcha = array(
        'name' => 'captcha',
        'id' => 'captcha',
        'value' => ''
    );
    $boton = array(
        'name' => 'loginAdmon',
        'id' => 'loginAdmon',
        'content' => 'Ingresar'
    );
    $formulario = array(
        'id' => 'fomulario',
        'name' => 'formulario'
    );
    ?>
    <?php echo form_open('administrador/login', $formulario); ?>
    <div class="intertitulobase2">Iniciar sesi&oacute;n</div>
    <br/>
    <div id="formulario">
        
        
        <table>
            <tbody>

                <tr>
                    <td><label>Usuario: </label></td>
                    <td>
                        <?php echo form_input($cedula); ?>
                    </td>
                    <td>
                        <div id="errorLogin"></div>
                    </td>
                </tr>
                
                <tr>
                    <td><label>Contrase&ntilde;a:</label> </td>
                    <td><?php echo form_password($contrasena); ?></td>

                </tr>


                <tr>

                    <td colspan="2" ><?php echo $imagen; ?></td>

                </tr>
                <tr>
                    <td colspan="2" class="msj">Ingrese los caracteres de la imagen: </td>
                </tr>
                <tr>

                    <td></td>
                    <td> <?php echo form_input($captcha); ?></td>
                    <td conlspan="2"><div id="captchaAdministrador"></div></td>
                    
                </tr>
              
                <tr>
                    <td colspan="2" ><div id="passRecovery"><a href="<?php echo base_url() ?>recuperarContrasena">&iquestHas olvidado la contrase&ntilde;a?</div></td>
                </tr>
            </tbody>
        </table>
        <br/>
        <?php
        echo form_button($boton);
        echo form_close();
        echo validation_errors();
        ?>


    </div>
</div>