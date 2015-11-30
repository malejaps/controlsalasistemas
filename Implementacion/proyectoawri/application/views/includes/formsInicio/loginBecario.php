<div id="contenido">
    <?php
    $codigo = array(
        'name' => 'codUsuarioBecario',
        'id' => 'codUsuarioBecario',
        'value' => ''
    );

    $contrasena = array(
        'name' => 'contrasena',
        'id' => 'contrasena',
        'value' => ''
    );
    $atributos = array(
        'name' => 'registrobecario',
        'id' => 'registrobecario',
    );
    $boton = array(
        'name' => 'inicioBecario',
        'id'   => 'inicioBecario',
        'content' => 'Ingresar'
    );
    ?>
    <?php
    echo form_open('becario/login', $atributos);
    ?>
    <div class="intertitulobase2">Iniciar sesi&oacute;n</div>
    <br/>
    <div id="formulario">
        <table>
            <tbody>
                <tr>
                    <td><label>C&oacute;digo:</label></td>
                    <td>
                        <?php echo form_input($codigo); ?>
                    </td>
                    <td>
                        <div id="codigoUsuario"></div>
                    </td>


                </tr>
                <tr>
                    <td><label>Contrasena:</label></td>
                    <td>
                        <?php echo form_password($contrasena); ?>

                    </td>
                    <td>
                        <div id="contrasenamsg"></div>
                    </td>

                </tr>


            </tbody>
        </table>

        <br/>     

        <?php echo form_button($boton); ?>
        <?php echo form_close(); ?>
        <div class="msjerror"><?php echo validation_errors(); ?></div>
    </div>



</div>