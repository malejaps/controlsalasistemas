<?php

class Iniciofuncionario extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->_isLogged();
    }
    
    function index() {
        $data['menu'] = 'funcionario';
        $data['titulo'] = 'Inicio';
        $data['contenido'] = 'principal';
        $data['datos'] = $this->session->userdata('datos');        
        $this->load->view('includes/template', $data);
    }
    
    function _isLogged() {
        if ($this->session->userdata('estado') != 1) {
            redirect('inicio');
        }
        if ($this->session->userdata('estado') == 1 && ($this->session->userdata('perfil') != 'funcionario')) {
            redirect('inicio'); //Corregir para redireccionar al index de toda la pagina
        }
    }
}
?>
