<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Becario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('becarioLogin');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->_isLogged();
        date_default_timezone_set('America/Bogota');
    }

    public function index() {
        $data['titulo'] = 'Sesion Becario';
        $data['menu'] = 'inicio';
        $data['contenido'] = 'loginBecario';
        $this->load->view('includes/template', $data);
    }

    function login() {
        $this->form_validation->set_rules('codUsuarioBecario', 'codigo de usuario', 'trin|required|exact_length[9]|callback__validarCodigo');
        $this->form_validation->set_rules('contrasena', 'contrasena', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        $this->form_validation->set_message('exact_length', 'El %s debe ser minimo de 9 caracteres');
        $this->form_validation->set_message('_validarCodigo', 'El %s no existe');
        $this->form_validation->set_message('_validarContrasena', 'La %s no es correcta');


        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $codigo = $this->input->post('codUsuarioBecario');
            $contrasena = $this->input->post('contrasena');
            $contrasenacorrecta = $this->becarioLogin->devolverContrasena($codigo);

            $fecha = date("Y-m-d");
            $hora_inicio = date("H:i:s");
            $ip = $_SERVER['REMOTE_ADDR'];
            $cod_pc = $this->becarioLogin->devolverCod_pcIP($ip);

            if ($contrasena == $contrasenacorrecta) {
                $this->becarioLogin->nuevoRegistro($fecha, $hora_inicio, $codigo, $cod_pc);
                $sesionCookie = array(
                    'perfil' => 'becario',
                    'estado' => '1',
                    'datos' => $this->becarioLogin->datosBecario($codigo)
                );
                $this->session->set_userdata($sesionCookie);
                redirect('inicioBecario');
            } else {
                $data['titulo'] = 'Sesion Becario';
                $data['menu'] = 'becario';
                $data['contenido'] = 'contrasenaIncorrecta';
                $this->load->view('includes/template', $data);
            }
        }
    }

    function _validarCodigo($codigo) {
        return $this->becarioLogin->validarUsuario($codigo);
    }

    function validarContrasena() {
        if ($this->input->is_ajax_request()) {
            $codigo = $this->input->post('usuario');
            $contrasena = $this->input->post('contrasena');
            if ($this->input->post('contrasena') != '') {
                if ($this->becarioLogin->validarContrasena($codigo, $contrasena)) {
                    echo 'true';
                } else {
                    echo 'false';
                }
            } else {
                echo 'vacio';
            }
        } else {
            echo 'acceso denegado';
        }
    }

    function validarCodigo() {
        if ($this->input->is_ajax_request()) {
            $codigo = $this->input->post('usuario');
            if ($codigo != '') {
                if ($this->becarioLogin->validarUsuario($codigo)) {
                    echo 'true';
                } else {
                    echo 'false';
                }
            } else {
                echo 'vacio';
            }
        } else {
            echo 'acceso denegado';
        }
    }

    function _isLogged() {
        if (($this->session->userdata('estado') == 1) && ($this->session->userdata('perfil') == 'becario')) {
            redirect('inicioBecario');
        }

        if ($this->session->userdata('estado') == 1 && ($this->session->userdata('perfil') != 'becario')) {
            redirect('inicio'); //Corregir para redireccionar al index de toda la pagina
        }

//        if ($this->session->userdata('estado') == 1 && ($this->session->userdata('perfil') == 'becario')) {
//            redirect('inicioBecario'); 
//        }
    }

}

?>
