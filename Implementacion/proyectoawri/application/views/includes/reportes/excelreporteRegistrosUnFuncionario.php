<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=registrosUnFuncionario.xls");
header("Pragma: no-cache");
header("Expires: 0");

$this->table->set_heading('Fecha', 'Cedula', 'Docente');
$estilo = array('table_open' => '<table border="1" id="tablagenerada" cellpadding="4" cellspacing="0">');
$this->table->set_template($estilo);
echo $this->table->generate($records);


?>









