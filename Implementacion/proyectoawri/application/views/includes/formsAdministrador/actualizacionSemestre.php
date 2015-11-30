<div id="contenido">
    <div id="formulario">
    <?php 
    $file = array(
'name' => 'userfile',
        'id' => 'userfile'
);
    $datos = array(
        'method' => 'post',
        'enctype' => 'multipart/form-data'        
    );
	
	
    ?> <div class="intertitulobase2" style="margin-left:10px">Importar estudiantes</div>
    <br/>
   <?php echo form_open('inicioAdministrador/cargarcsv',$datos);
   
?>
<div id="importados" >
<br/>
<?php   echo form_label('Cargar archivo csv: ', 'archivo'); ?> 
 </div>
  <?php  echo form_hidden('MAX_FILE_SIZE','500000');
    ?>
	<br/>
	<?php echo form_upload($file);?>
	<br/>
	<br/>
	<?php
    echo form_submit('submit', 'Subir Archivo csv');
    echo form_close();        
    
    echo form_open('inicioAdministrador/EstadosDesactivados');     
   ?>
   <div id="submitdesactivar">
   <?php echo form_submit('submit', 'Desactivar Estado Estudiantes');
    echo form_close();
    echo form_fieldset_close();
    echo validation_errors();
    ?>
</div>
</div>
    </div>
