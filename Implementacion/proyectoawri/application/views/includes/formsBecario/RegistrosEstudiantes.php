<div id="contenido">
    <br/>
    <div class="intertitulobase">Registros estudiantes</div>
     <br/>
      <br/>
<?php
$this->table->set_heading('Fecha', 'Estudiante', 'Computador', 'Hora Inicio', 'Hora Fin');
$estilo = array('table_open' => '<table border="1" id="tablagenerada" cellpadding="4" cellspacing="0">');
$this->table->set_template($estilo);
echo  $this->table->generate($registros);


?> 
</div>







