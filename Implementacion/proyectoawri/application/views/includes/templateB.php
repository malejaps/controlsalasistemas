<?php
$this->load->view('includes/header', $titulo);
$this->load->view('includes/menus/'.$menu);
$reg['registros']=$datos;

$this->load->view('includes/forms'.$menu.'/'.$contenido, $reg); 
$this->load->view('includes/footer');
?>
