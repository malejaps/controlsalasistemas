<div id="contenido">
    <?php
    $codigo = array(
        'name' => 'codUsuario',
        'id' => 'codUsuario',
        'value' => ''
    );
    $programa = array(
        'name' => 'programa',
        'id' => 'programa',
        'value' => ''
    );
    $practica = array(
        'name' => 'practica',
        'id' => 'practica',
        'value' => ''
    );
    
    $boton = array(
        'name' => 'boton',
        'id'   => 'boton',
        'content' => 'Ingresar'
    );
    ?>
    <?php echo form_open('estudiante/login'); ?>
    <div class="intertitulobase2">Iniciar sesi&oacute;n</div>
    <br/>
    <div id="formulario">
    <table>
        <tbody>
            <tr>
                <td><label>Usuario:</label> </td>
                <td>
                    <?php echo form_input($codigo); ?>

                </td>
                <td>
                    <div id="codigoUsuario"></div>
                </td>

            </tr>
            <tr>
                <td><label>Programa academico:</label> </td>
                <td><div id="programaAcademico"></div></td>
            </tr>
            <tr>
                <td><label>Tipo de practica:</label> </td>
                <td><select name="practicas" id="practicas">
                        <option>Acad&eacute;mica</option>
                        <option>Capacitaci&oacute;n</option>
                        <option>Extenci&oacute;n</option>
                        <option>Libre</option>
                    </select></td>
            </tr>

        </tbody>
    </table>
        <br/>
    <?php
    echo form_button($boton);
    echo form_close();
    ?><div class="msjerror"><?php echo validation_errors();?></div>
    
            </div>


</div>