<?php
$this->load->library('mpdf');
$mpdf = new mPDF();

$this->table->set_heading('Codigo Sancion', 'Estudiante', 'Descripcion', 'Fecha', 'Estado');
$estilo = array('table_open' => '<table border="1" id="tablagenerada" cellpadding="4" cellspacing="0">');
$this->table->set_template($estilo);
$variable = $this->table->generate($records);

$mpdf->WriteHTML("<img src='imagenes/univalle.jpg' align='left'><h4>Registro de Usuarios Sala Sistemas Univalle 
    Sede Palmira<br/> Universidad del Valle - Sede Palmira</h4><h2>Paz y salvo</h2>
    <div id='frase'><br/>El estudiante se encuentra a paz y salvo.<br/> Tabla de verificación:
        </div><br/>".$variable);
$mpdf->Output('pazysalvo.pdf','I');
exit;
?> 









