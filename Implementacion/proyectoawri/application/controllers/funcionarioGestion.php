<?php

class FuncionarioGestion extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('funcionarioLogin');
        $this->load->helper('form');
        $this->load->library('form_validation');
       
    }

   
      function _isLogged() {
        if (($this->session->userdata('estado') == 1) && ($this->session->userdata('perfil') == 'funcionario')) {
            redirect('inicioFuncionario');
        }

        if ($this->session->userdata('estado') == 1 && ($this->session->userdata('perfil') != 'funcionario')) {
            redirect('inicio'); //Corregir para redireccionar al index de toda la pagina
        }
        
    }
    
  public function cerrarsesion() {
       
        
        $this->session->sess_destroy();
        redirect('estudiante/sesionCerrada');
    }
    
//     public function sesionCerrada() {
//
//
//        $data['titulo'] = 'Inicio';
//        $data['menu'] = 'inicio';
//        $data['contenido'] = 'cerrarsesion';
//        $this->load->view('includes/template', $data);
//    }
}

?>
