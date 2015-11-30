<?php

class InicioEstudiante extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->_isLogged();
    }

    function index() {
        $data['menu'] = 'estudiante';
        $data['titulo'] = 'Inicio';
        $data['contenido'] = 'principal';
        $data['datos'] = $this->session->userdata('datos');
        $this->load->view('includes/template', $data);
    }

    //Cuando se inicie sesion no se puede pasar a otra sesion, si se intenta se redirecciona al inicio
    function _isLogged() {
        if ($this->session->userdata('estado') != 1) {
            redirect('inicio');
        }
        if ($this->session->userdata('estado') == 1 && ($this->session->userdata('perfil') != 'estudiante')) {
            redirect('inicio'); //Corregir para redireccionar al index de toda la pagina
        }
    }

}

?>
