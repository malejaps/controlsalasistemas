<?php
$this->load->library('mpdf');
$mpdf = new mPDF();

$this->table->set_heading('Fecha', 'Cedula', 'Docente');
$estilo = array('table_open' => '<table border="1" id="tablagenerada" cellpadding="4" cellspacing="0">');
$this->table->set_template($estilo);
$variable = $this->table->generate($records);

$mpdf->WriteHTML("<img src='imagenes/univalle.jpg' align='left'><h4>Registro de Usuarios Sala Sistemas Univalle 
    Sede Palmira<br/> Universidad del Valle - Sede Palmira</h4><h2>Registros de un Funcionario</h2>
    <div id='frase'><br/>Registros del funcionario con cédula ".$codigo." entre las fechas: ".$fechainicio." y ".$fechafin."
         <br/></div><br/>".$variable);
$mpdf->Output('registrosDelFuncionario'.$codigo.'.pdf','I');
exit;
?>









