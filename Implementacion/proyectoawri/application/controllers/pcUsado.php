<?php

class PcUsado extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $data['menu'] = 'estudiante';
        $data['titulo'] = 'PC usado';
        $data['contenido'] = 'pcUsado';
        $this->load->view('includes/template', $data);
    }

}

?>
