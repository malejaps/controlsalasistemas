<?php
$this->load->view('includes/header', $titulo);
$this->load->view('includes/menus/'.$menu);
$this->load->view('includes/forms'.$menu.'/'.$contenido); 
$this->load->view('includes/footer');
?>
