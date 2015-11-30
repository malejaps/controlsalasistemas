<?php

class sancionExitosa extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $data['menu'] = 'administrador';
        $data['titulo'] = 'Sesion Administrador';
        $data['contenido'] = 'registroExitoso';
        $this->load->view('includes/template', $data);
    }

}
?>

