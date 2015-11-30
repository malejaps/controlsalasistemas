<?php

class Estudiante extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('estudianteLogin');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->_isLogged();
    }

    public function index() {
        $data['titulo'] = 'Inicio';
        $data['menu'] = 'inicio';
        $data['contenido'] = 'loginEstudiante';
        $this->load->view('includes/template', $data);
    }

    public function login() {


        $this->form_validation->set_rules('codUsuario', 'codigo de usuario', 'trim|required|callback__validarCodigo');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        $this->form_validation->set_message('_validarCodigo', 'El %s no existe');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            
                date_default_timezone_set('America/Bogota');
                $codigo = $this->input->post('codUsuario');
                $fecha = date("Y-m-d");
                $hora_inicio = date("H:i:s");
                $practica = $this->estudianteLogin->devolverCodigoPractica($this->input->post('practicas'));
                $ip = $_SERVER['REMOTE_ADDR'];
                $cod_pc = $this->estudianteLogin->devolverCod_pcIP($ip);
                $this->estudianteLogin->nuevoRegistro($fecha, $hora_inicio, $codigo, $practica, $cod_pc);
                $sesionCookie = array(
                    'perfil' => 'estudiante',
                    'estado' => '1',
                    'datos' => $this->estudianteLogin->datosEstudiante($codigo)
                );
                $this->session->set_userdata($sesionCookie);
                redirect('inicioEstudiante');
            }
        
    }
    
     public function cerrarsesion() {
       
        
         $this->session->sess_destroy();
        redirect('estudiante/sesionCerrada');
       
    }
    
     public function sesionCerrada() {


        $data['titulo'] = 'Inicio';
        $data['menu'] = 'inicio';
        $data['contenido'] = 'cerrarsesion';
        $this->load->view('includes/template', $data);
    }

    function _validarCodigo($codigo) {
        return $this->estudianteLogin->validarUsuario($codigo);
    }

    function validacionAjax() {
        if ($this->input->is_ajax_request()) {
            $codigo = $this->input->post('codigo_usuario');
            if ($codigo == '') {
                echo 'vacio';
            } else {
                if ($this->estudianteLogin->validarUsuario($codigo)) {
                    if ($this->estudianteLogin->validarEstadoUsuario($codigo)) {
                        echo $this->estudianteLogin->devolverPrograma($codigo);
                    }
                    else{
                        echo 'inactivo';
                    }
                } else {
                    echo 'FALSE';
                }
            }
        } else {
            echo 'acceso denegado';
        }
    }

    function _isLogged() {
        if (($this->session->userdata('estado') == 1) && ($this->session->userdata('perfil') == 'estudiante')) {
            redirect('inicioEstudiante');
        }

        if ($this->session->userdata('estado') == 1 && ($this->session->userdata('perfil') != 'estudiante')) {
            redirect('inicio'); //Corregir para redireccionar al index de toda la pagina
        }
    }

}

?>
