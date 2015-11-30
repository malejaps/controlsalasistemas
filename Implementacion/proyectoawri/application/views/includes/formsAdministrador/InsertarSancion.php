<div id="contenido">
    <?php
    
     $codigo = array(
        'name' => 'codEst',
        'id' => 'codEst',
        'value' => ''
    );
    $descripcion = array(
        'name' => 'descripcion',
        'id' => 'descripcion',
        'value' => ''
    );

    $formulario = array(
        'name' => 'formulario',
        'id' => 'formulario',
        'value' => ''
    );

    $boton = array(
        'name' => 'insertarsancion',
        'id' => 'insertarsancion',
        'content' => 'Insertar'
    );
    ?>
    <?php
  
    echo form_open('inicioAdministrador/sanciones', $formulario);
    ?>
    <div class="intertitulobase2">Insertar sanci&oacute;n</div>
    <br/>
    <div id="formulario">
        <table>
            <tbody>

                <tr>
                    <td><label>Estudiante:</label> </td>
                    <td><select id="codEst" name="codEst">

                            <?php foreach ($registros as $valor) { ?>

                                <option> <?php echo $valor['Codigo'] ?> </option>

                            <?php } ?>

                        </select></td>
                </tr>
                <tr>
                    
                    <td><label>Descripcion:</label> </td>
                    <td>
                        <?php echo form_textarea($descripcion); ?>
                        
                    </td> 
                       <td>
                        <div id="error_descripcion"></div>
                    </td>
                    
                </tr>
               
            </tbody>
        </table>

       <?php echo form_button($boton);?>
        <?php echo form_close(); ?>
        <div class="msjerror"><?php echo validation_errors(); ?></div>
        
    </div>
</div>