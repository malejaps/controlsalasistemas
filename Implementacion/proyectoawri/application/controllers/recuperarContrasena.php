<?php

class RecuperarContrasena extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('modelAdmin');
        $this->load->library('email');
    }

    function index() {
        $data['menu'] = 'inicio';
        $data['titulo'] = 'Recuperar contrase&ntilde;a';
        $data['contenido'] = 'recuperarContrasena';
        $this->load->view('includes/template', $data);
    }

    function validarAjax() {
        if ($this->input->is_ajax_request()) {
            if ($this->modelAdmin->validarCedulaAdmin($this->input->post('cedula'))) {
                echo 'true';
            } else {
                echo 'false';
            }
        } else {
            echo 'acceso denegado';
        }
    }

    function enviar() {
        $datosAdministrador = $this->modelAdmin->emailAdmin($this->input->post('cedulaRe'));
        $mensaje = 'Hola '.$datosAdministrador['nombre'].' '.$datosAdministrador['apellido'].',<br/><br/>'.
                'hemos recibido una solicitud para recuperar su contrase&ntilde;a. <br/> Su contrase&ntilde;a actual es: '.
                $datosAdministrador['contrasena'].'<br/><br/><br/>Si no ha solicitado recuperar su contrase&ntilde;a por favor ignore este mensaje.';
        $this->email->from('salas.sistemas.univalle@gmail.com', 'Salas de sistemas Univalle');
        $this->email->to($datosAdministrador['email']);
        $this->email->subject('Recuperacion de contraseña');
        $this->email->message($mensaje);
        $this->email->send();
        $data = array();
        $data['menu']='inicio';
        $data['titulo'] = 'Solicitud enviada';
        $data['contenido'] = 'contrasenaEnviada';
        
        $this->load->view('includes/template', $data);
    }

}

?>
