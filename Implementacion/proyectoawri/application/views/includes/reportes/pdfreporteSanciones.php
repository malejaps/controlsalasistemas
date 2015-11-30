<?php
$this->load->library('mpdf');
$mpdf = new mPDF();

$this->table->set_heading('Fecha', 'Código', 'Nombre');
$estilo = array('table_open' => '<table border="1" id="tablagenerada" cellpadding="4" cellspacing="0">');
$this->table->set_template($estilo);
$variable = $this->table->generate($records);

$mpdf->WriteHTML("<img src='imagenes/univalle.jpg' align='left'><h4>Registro de Usuarios Sala Sistemas Univalle Sede Palmira<br/>
    Universidad del Valle - Sede Palmira</h4><h2>Usuarios Sancionados</h2><div id='frase'>
    <br/>Registros de los usuarios sancionados entre las fechas: ".$fechainicio." y ".$fechafin."<br/></div><br/>".$variable);
$mpdf->Output('SancionesUsuarios.pdf','I');
exit;
?> 









