<div id="contenido">
    <?php
   

//    $contrasenaAntigua = array(
//        'name' => 'contrasenaAntigua',
//        'id' => 'contrasenaAntigua',
//        'value' => ''
//    );

    $contrasena = array(
        'name' => 'contrasena',
        'id' => 'contrasena',
        'value' => ''
    );
	
	 $contrasena2 = array(
        'name' => 'contrasena2',
        'id' => 'contrasena2',
        'value' => ''
    );
	 $formulario = array(
        'id' => 'formulario',
        'name' => 'formulario'
    );
	$boton = array(
        'name' => 'actualizarContrasena',
        'id' => 'actualizarContrasena',
        'content' => 'Cambiar contrase&ntilde;a'
    );
    ?>
    <?php
    
    echo form_open('inicioAdministrador/actualizarContrasenaBecario', $formulario);
    ?>
    <div class="intertitulobase2">Actualizar contrase&ntilde;a del becario</div>
    <br/>
    <div id="formulario">
        <table>
            <tbody>

                <tr>
                    <td><label>Codigo Becario:</label> </td>
                    <td><select id="codigoBeca" name="codigoBeca" >

                            <?php foreach ($registros as $valor) { ?>

                                <option> <?php echo $valor['estudiantes_Codigo'] ?> </option>

                            <?php } ?>

                        </select></td>
                    <td>
                        <div id="estudiantes_codigo"></div>
                    </td>

                </tr>
<!--                <tr>
                    <td><label>Contrase&ntilde;a Antigua:</label> </td>
                    <td>
                        <?php //echo form_input($contrasenaAntigua); ?>

                    </td>
                    <td>
                        <div id="error_contrasenaAntigua"></div>
                    </td>
                </tr>-->

                <tr>
                    <td><label>Contrase&ntilde;a Nueva:</label> </td>
                    <td>
                        <?php echo form_password($contrasena); ?>

                    </td>
                    <td>
                        <div id="error_contrasena"></div>
                    </td>
                </tr>
		<tr>
                    <td><label>Confirmar Contrase&ntilde;a :</label> </td>
                    <td>
                        <?php echo form_password($contrasena2); ?>

                    </td>
                    <td>
                        <div id="error_contrasena2"></div>
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