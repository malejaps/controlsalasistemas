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
    <?php echo form_open('becarioGestion/finalizarBecario', $formulario); ?>
     
     <div id="formulario">
         <div class="intertitulobase2" style="margin-left:50px ">Finalizar jornada becario</div>
    <br/>
    <table>
        <tbody>
           <tr><td class="textarea"><label>Observaciones:<label> </td>
                       </tr>
            <tr>
                
                <td >
                    <?php echo form_textarea($observacion);?>                    
                </td>
           

            </tr>
         
           
           

        </tbody>
        <tfoot> <div id="error_observacion"></div></tfoot>
    </table>
  
       <?php echo form_submit('submit','Finalizar'); ?>
       <?php echo form_close(); ?>
        <div class="msjerror"><?php echo validation_errors(); ?></div>
        <div id="error_observacion"></div>
     </div>

</div>