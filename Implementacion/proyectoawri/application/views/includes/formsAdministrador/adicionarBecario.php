<div id="contenido">
    <?php
    $cargo = array(
        'name' => 'cargo',
        'id' => 'cargo',
        'value' => ''
    );
    $contrasena = array(
        'name' => 'contrasena',
        'id' => 'contrasena',
        'value' => ''
    );

    $boton = array(
        'name' => 'adicionarBecario',
        'id' => 'adicionarBecario',
        'content' => 'Adicionar'
    );
    $formulario = array(
        'id' => 'formulario',
        'name' => 'formulario'
    );
    ?>
    <?php echo form_open('inicioAdministrador/adicionarBecario', $formulario); ?>
    <div class="intertitulobase2">Adicionar becario</div>
    <br/>
    <div id="formulario">
        <table>
            <tbody>

                <tr>
                    <td collspan="3"><label>Codigo:</label> </td>
                
               
                    <td colspan="1"><select id="codBec" name="codBec" title="Estudiantes que no son becarios">

                                <?php foreach ($registros as $valor) { ?>

                                <option > <?php echo $valor->Codigo ?> </option>

                                <?php } ?>
                        </select></td>

                    <td colspan="1">
                        <div id="error_codigo"></div>
                    </td>
                </tr>  
                <tr>
                    <td><label>Cargo:</label> </td>
                    <td>
<?php echo form_input($cargo); ?>

                    </td>
                    <td>
                        <div id="error_cargo"></div>
                    </td>
                </tr>
                <tr>
                    <td><label>Contrasena:</label> </td>
                    <td>
<?php echo form_password($contrasena); ?>

                    </td>
                    <td>
                        <div id="error_contrasena"></div>
                    </td>
                </tr>

            </tbody>
        </table>
<?php echo form_button($boton); ?>
<?php echo form_close(); ?>
        <div class="msjerror"><?php echo validation_errors(); ?></div>

    </div>
</div>
