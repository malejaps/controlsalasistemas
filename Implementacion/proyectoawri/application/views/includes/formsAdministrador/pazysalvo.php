<div id="contenido">
     
 <div class="intertitulobase">Generar paz y salvo</div>
    <br/>
    <div id="tabla"> <?php
$this->table->set_heading('Codigo', 'Estudiante', 'Descripcion','Fecha','Estado');
$estilo = array('table_open' => '<table border="1" id="tablagenerada" cellpadding="4" cellspacing="0">');
$this->table->set_template($estilo);

echo $this->table->generate($records);

echo $this->pagination->create_links();
?> 

    </div>
    <?php
    $con_san = array(
        'name' => 'sancion',
        'id' => 'sancion',
        'value' => ''
    );
    
    
    $formulario = array(
        'name' => 'formulario',
        'id' => 'formulario',
        'value' => ''
    );

    $boton = array(
        'name' => 'pazysalvo',
        'id' => 'pazysalvo',
        'content' => 'Generar paz y salvo'
    );
    ?>
    <?php
  
    echo form_open('inicioAdministrador/pazysalvo', $formulario);
    ?>
    
    <br/>
    
    <div id="formulario">
       
        
    <table>
        <tbody>
       

        <tr>
            <td><label  style="margin-left: 100px">Codigo Sancion:</label> </td>
              <td><select id="sancion" name="sancion" >

                            <?php foreach ($registros as $valor) { ?>

                                <option> <?php echo $valor['con_san'] ?> </option>

                            <?php } ?>

                        </select></td>
        
            <td>
                <div id="error_con_san"></div>
            </td>
            
        </tr>


        </tbody>
    </table>  <?php echo form_submit('submit','Generar Paz y Salvo');?>
      <?php echo form_close();
      
      
      ?>
        <div class="msjerror"><?php echo validation_errors(); ?></div>

     </div>
    
</div>








