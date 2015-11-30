<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Administrador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('modelAdmin');
        $this->load->library('form_validation');
        $this->load->helper('captcha'); //Cargamos el helper para el captcha
        $this->_isLogged();
    }

    public function index() {

        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'inicio';
        $data['contenido'] = 'loginAdministrador';
        global $captcha;
        $captcha = array(
            'img_path' => './captcha/',
            'img_url' => base_url() . 'captcha/',
            'font_path' => './fonts/ARLRDBD.ttf',
            'img_width' => '150',
            'img_height' => 30,
            'expiration' => 60,
        );
        global $img;
        $img = create_captcha($captcha);
        $expiracion = $img['time'] - $captcha['expiration'];
        $this->modelAdmin->borrarCaptcha($expiracion); //Eliminar captchas expiradas
        $this->modelAdmin->insertarCaptcha($img['time'], $this->input->ip_address(), $img['word']); //Insertar captcha en la bd
        $data['imagen'] = $img['image'];
        $this->load->view('includes/template', $data);
    }

    function login() {
        $this->form_validation->set_rules('cedula', 'cedula', 'required|callback__validarCedula');
        $this->form_validation->set_rules('contrasena', 'contrasena', 'required');
        $this->form_validation->set_rules('captcha', 'captcha', 'required|callback__validarCaptcha');
        $this->form_validation->set_message('required', 'El campo %s es requerido.');
        $this->form_validation->set_message('_validarCaptcha', 'Los caracteres ingresados son incorrectos');
        $this->form_validation->set_message('_validarCedula', 'Usuario o contraseña incorrectos.');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $sesionCookie = array(
                'perfil' => 'administrador',
                'estado' => '1',
                'cedula' => $this->input->post('cedula')
            );
            $this->session->set_userdata($sesionCookie);
            date_default_timezone_set('America/Bogota'); //Establecer la zona horaria de nuestro pais
            $fecha = $this->modelAdmin->verficarFechaContrasena($this->input->post('cedula'));
            $fechaContrasena = strtotime($fecha);
            $fechaActual = strtotime(date("Y-m-d"));
            $diasUltimaContrasena = ($fechaActual - $fechaContrasena) / 60 / 60 / 24;
            if ($diasUltimaContrasena >= 90) {
                $data = array();
                $data['titulo'] = 'Sesion Administrador';
                $data['menu'] = 'administrador';
                $data['contenido'] = 'solicitudCambio';
                $this->load->view('includes/template', $data);
            } else {
                redirect('inicioAdministrador/principal');
            }
        }
    }

    function _validarUsuario() {
        $cedula = $this->input->post('cedula');
        $contrasena = $this->input->post('contrasena');
        if ($this->modelAdmin->validarAdministrador($cedula, $contrasena)) {
            return true;
        } else {
            return false;
        }
    }

    function _validarCaptcha() {
        global $img;
        global $captcha;
        $expir = $img['time'] - $captcha['expiration'];
        $valores = array($this->input->post('captcha'), $this->input->ip_address(), $expir);
        return $this->modelAdmin->captchaExist($valores);
    }

    function validacionUsuarioAjax() {
        if ($this->input->is_ajax_request()) {
            $cedula = $this->input->post('cedAdmin');
            $contrasena = $this->input->post('contAdmin');
            if ($this->modelAdmin->validarAdministrador($cedula, $contrasena)) {
                echo 'true';
            } else {
                echo 'false';
            }
        } else {
            echo 'acceso denegado';
        }
    }

    function validacionCaptchaAjax() {
        if ($this->input->is_ajax_request()) {
            global $img;
            global $captcha;
            $expir = $img['time'] - $captcha['expiration'];
            $valores = array($this->input->post('captchaAdmin'), $this->input->ip_address(), $expir);
            if ($this->modelAdmin->captchaExist($valores)) {
                echo 'true';
            } else {
                echo 'false';
            }
        } else {
            echo 'acceso denegado';
        }
    }

    function _isLogged() {
        if (($this->session->userdata('estado') == 1) && ($this->session->userdata('perfil') == 'administrador')) {
            redirect('inicioAdministrador/principal');
        }

        if ($this->session->userdata('estado') == 1 && ($this->session->userdata('perfil') != 'administrador')) {
            redirect('inicio'); 
        }
    }

}

?>
