<div id="contenido">
    <?php
    $observacion = array(
        'name' => 'observacion',
        'id' => 'observacion',
        'value' => ''
    );
    
    $formulario = array(
        'name' => 'formfinalizar',
        'id' => 'formfinalizar',
        'value' => ''
    );
    
     $boton = array(
        'name' => 'finalizar',
        'id' => 'finalizar',
        'content' => 'Finalizar'
    );


  
    ?>
    <?php echo form_open('becarioGestion/finalizarFuncionario', $formulario); ?>

    <div id="formulario">
        <div class="intertitulobase2" style="margin-left:30px ">Finalizar jornada funcionario</div>
        <br/>
        <table>
            <tbody>
<tr>
    <td class="textarea">
        <label>Observaciones:<label> 
                </td> 
               
                </tr>
                <tr>
                    <td >
                        <?php echo form_textarea($observacion); ?>                    
                    </td>
                    <td>
                        <div id="error_observacion"></div>
                    </td>


                </tr>
             



                </tbody>
                </table>

<?php echo form_submit('submit','Finalizar'); ?>
<?php echo form_close(); ?>
<div class="msjerror"><?php echo validation_errors(); ?></div>
</div>

</div>