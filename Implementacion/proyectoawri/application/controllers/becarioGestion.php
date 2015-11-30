<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class BecarioGestion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->_isLogged();
        $this->load->model('becario');
        $this->load->model('becarioLogin');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('table');
    }

    public function index() {
        
    }

    public function actualizarEstudiante() {

        $data['titulo'] = 'Sesion Becario';
        $data['menu'] = 'becario';
        $data['contenido'] = 'actualizarEstudiante';
        $this->load->view('includes/template', $data);
        $this->form_validation->set_rules('codUsuarioEstudiante', 'codigo de usuario', 'trim|required|callback__validarCodigo');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        $this->form_validation->set_message('_validarCodigo', 'El %s no existe');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $codigo = $_POST['codUsuarioEstudiante'];
            $telefono = $_POST['telUsuario'];
            $direccion = $_POST['dirUsuario'];
            $correo = $_POST['correoUsuario'];

            $this->becario->actualizarEstudiante($codigo, $telefono, $direccion, $correo);
            redirect('becarioGestion/estudianteActualizado');
        }
    }

    public function estudianteActualizado() {
        $data['titulo'] = 'Sesion Becario';
        $data['menu'] = 'becario';
        $data['contenido'] = 'estudianteActualizado';
        $this->load->view('includes/template', $data);
    }

    public function datosParaActivarEstudiante() {
        $data['titulo'] = 'Sesion Becario';
        $data['menu'] = 'becario';
        $data['contenido'] = 'datosParaActivarEstudiante';
        $this->load->view('includes/template', $data);
        $this->form_validation->set_rules('codigo', 'codigo de usuario', 'trim|required');
        $this->form_validation->set_rules('programa', 'programa', 'trim|required');
        $this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
        $this->form_validation->set_rules('telefono', 'telefono', 'trim|required');
        $this->form_validation->set_rules('direccion', 'direccion', 'trim|required');
        $this->form_validation->set_rules('correo', 'correo', 'trim|required');
        $this->form_validation->set_message('required', 'El campo es requerido');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $codigo = $this->input->post('codUsuario');
            $nombre = $this->input->post('nombre');
            $programa = $this->input->post('programa');
            $telefono = $this->input->post('telefono');
            $direccion = $this->input->post('direccion');
            $correo = $this->input->post('correo');
            $this->becario->pedirCambioDeEstadoEstudiante($codigo, $programa, $nombre, $telefono, $direccion, $correo);
            redirect('becarioGestion/datosAdicionadosEstudiante');
        }
    }

    public function datosAdicionadosEstudiante() {

        $data['titulo'] = 'Sesion Becario';
        $data['menu'] = 'becario';
        $data['contenido'] = 'datosAdicionadosEstudiante';
        $this->load->view('includes/template', $data);
    }

    public function datosAdicionarFuncionario() {

        $data['titulo'] = 'Sesion Becario';
        $data['menu'] = 'becario';
        $data['contenido'] = 'datosparaActivarFuncionario';
        $this->load->view('includes/template', $data);
        $this->form_validation->set_rules('cedula', 'codigo de usuario', 'trim|required');
        $this->form_validation->set_rules('nombre', 'programa', 'trim|required');
        $this->form_validation->set_rules('telefono1', 'nombre', 'trim|required');
        $this->form_validation->set_rules('telefono2', 'telefono', 'trim|required');
        $this->form_validation->set_rules('correo', 'direccion', 'trim|required');
        $this->form_validation->set_message('required', 'El campo es requerido');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $cedula = $this->input->post('cedula');
            $nombre = $this->input->post('nombre');
            $telefono1 = $this->input->post('telefono1');
            $telefono2 = $this->input->post('telefono2');
            $correo = $this->input->post('correo');
            $this->becario->pedirCambioDeEstadoFuncionario($cedula, $nombre, $telefono1, $telefono2, $correo);
            redirect('becarioGestion/datosAdicionadosFuncionario');
        }
    }

    public function datosAdicionadosFuncionario() {
        $data['titulo'] = 'Sesion Becario';
        $data['menu'] = 'becario';
        $data['contenido'] = 'datosAdicionadosDocente';
        $this->load->view('includes/template', $data);
    }

    public function finalizarFuncionario() {

        $data['titulo'] = 'Sesion Becario';
        $data['menu'] = 'becario';
        $data['contenido'] = 'finalizarFuncionario';
        $this->load->view('includes/template', $data);

        $this->form_validation->set_rules('observacion', 'observacion', 'trim|required');
        $this->form_validation->set_message('required', 'El campo es requerido');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

            $observacion = $this->input->post('observacion');
            $horasalida = date("H:i:s");

            $this->becario->finalizarFuncionario($horasalida, $observacion);
            redirect('becarioGestion/jornadaFuncionarioFinalizada');
        }
    }

    public function finalizarBecario() {


        $data['titulo'] = 'Sesion Becario';
        $data['menu'] = 'becario';
        $data['contenido'] = 'finalizarBecario';
        $this->load->view('includes/template', $data);


        $this->form_validation->set_rules('observacion', 'observacion', 'trim|required');
        $this->form_validation->set_message('required', 'El campo es requerido');


        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {


            $observacion = $this->input->post('observacion');
            $horasalida = date("H:i:s");

            $this->becario->finalizarBecario($observacion, $horasalida);
            redirect('becarioGestion/jornadaBecarioFinalizada');
            //$this->session->sess_destroy();
        }
    }

    function jornadaBecarioFinalizada() {

        $data['titulo'] = 'Sesion Becario';
        $data['menu'] = 'becario';
        $data['contenido'] = 'jornadaBecarioFinalizada';
        $this->load->view('includes/template', $data);
    }

    function jornadaFuncionarioFinalizada() {

        $data['titulo'] = 'Sesion Becario';
        $data['menu'] = 'becario';
        $data['contenido'] = 'jornadaFuncionarioFinalizada';
        $this->load->view('includes/template', $data);
    }

    public function cerrarsesion() {


        $this->session->sess_destroy();
        redirect('estudiante/sesionCerrada');
    }

//CONSULTAS

    public function vistaRegistroBecario() {



        $this->form_validation->set_rules('fechainicio', 'Fecha Inicio', 'trim|required');
        $this->form_validation->set_rules('fechafin', 'Fecha Fin', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $fechainicio = $this->input->post('fechainicio');
            $fechafin = $this->input->post('fechafin');
            $data["datos"] = $this->becario->devolverRegistrosBecario($fechainicio, $fechafin);
            $data["fechainicio"] = $fechainicio;
            $data["fechafin"] = $fechafin;

            $data['titulo'] = 'Sesion Becario';
            $data['menu'] = 'becario';
            $data['contenido'] = 'RegistroBecario';
            $this->load->view('includes/templateB', $data);
        }
    }

    public function RegistroBecario() {

        $data = array();
        $data['titulo'] = 'Sesion Becario';
        $data['menu'] = 'becario';
        $data['contenido'] = 'IntervaloRegistroBecario';
        $this->load->view('includes/template', $data);
    }

    public function vistaRegistroEstudiantes() {
        
        $this->form_validation->set_rules('fechainicio', 'Fecha Inicio', 'trim|required');
        $this->form_validation->set_rules('fechafin', 'Fecha Fin', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $fechainicio = $this->input->post('fechainicio');
            $fechafin = $this->input->post('fechafin');
            $data["datos"] = $this->becario->devolverRegistrosEstudiantes($fechainicio, $fechafin);
            $data["fechainicio"] = $fechainicio;
            $data["fechafin"] = $fechafin;

            $data['titulo'] = 'Sesion Becario';
            $data['menu'] = 'becario';
            $data['contenido'] = 'RegistrosEstudiantes';
            $this->load->view('includes/templateB', $data);
        }
    }

    public function RegistrosEstudiantes() {

        $data = array();
        $data['titulo'] = 'Sesion Becario';
        $data['menu'] = 'becario';
        $data['contenido'] = 'reporteRegistrosEStudiantes';
        $this->load->view('includes/template', $data);
    }

//FIN CONSULTAS




    function _validarCodigo($codigo) {
        return $this->becario->validarUsuario($codigo);
    }

    function validacionAjaxTelefono() {
        if ($this->input->is_ajax_request()) {
            $codigo = $this->input->post('codigo_usuario');
            if ($codigo == '') {
                echo 'vacio';
            } else {
                if ($this->becario->validarUsuario($codigo)) {

                    echo $this->becario->devolverTelefonoEstudiante($codigo);
                } else {
                    echo 'FALSE';
                }
            }
        } else {
            echo 'acceso denegado';
        }
    }

    function validacionAjaxDireccion() {
        if ($this->input->is_ajax_request()) {
            $codigo = $this->input->post('codigo_usuario');
            if ($codigo == '') {
                echo 'vacio';
            } else {
                if ($this->becario->validarUsuario($codigo)) {

                    echo $this->becario->devolverDireccionEstudiante($codigo);
                } else {
                    echo 'FALSE';
                }
            }
        } else {
            echo 'acceso denegado';
        }
    }

    function validacionAjaxCorreo() {
        if ($this->input->is_ajax_request()) {
            $codigo = $this->input->post('codigo_usuario');
            if ($codigo == '') {
                echo 'vacio';
            } else {
                if ($this->becario->validarUsuario($codigo)) {

                    echo $this->becario->devolverCorreoEstudiante($codigo);
                } else {
                    echo 'FALSE';
                }
            }
        } else {
            echo 'acceso denegado';
        }
    }

    function validacionActualizar() {
        if ($this->input->is_ajax_request()) {
            $correo = $this->input->post('correo');
            if ($correo == '') {
                echo 'correoVacio';
            } else {
                if (!$this->comprobar_email($correo)) {
                    echo 'errorEmail';
                } else {
                    echo 'okEmail';
                }
            }
        } else {
            echo 'acceso denegado';
        }
    }

    function verificarCedulaUnica() {
        if ($this->input->is_ajax_request()) {
            $cedula = $this->input->post('cedula');
            if ($this->becario->buscarCedula($cedula)) {
                echo 'false';
            } else {
                echo 'true';
            }
        } else {
            echo 'acceso denegado';
        }
    }

    function verificarCodigoUnico() {
        if ($this->input->is_ajax_request()) {
            $codigo = $this->input->post('codigo');
            if ($this->becario->buscarCodigo($codigo)) {
                echo 'false';
            } else {
                echo 'true';
            }
        } else {
            echo 'acceso denegado';
        }
    }

    function comprobar_email($email) {
        $mail_correcto = 0;
        //compruebo unas cosas primeras 
        if ((strlen($email) >= 6) && (substr_count($email, "@") == 1) && (substr($email, 0, 1) != "@") && (substr($email, strlen($email) - 1, 1) != "@")) {
            if ((!strstr($email, "'")) && (!strstr($email, "\"")) && (!strstr($email, "\\")) && (!strstr($email, "\$")) && (!strstr($email, " "))) {
                //miro si tiene caracter . 
                if (substr_count($email, ".") >= 1) {
                    //obtengo la terminacion del dominio 
                    $term_dom = substr(strrchr($email, '.'), 1);
                    //compruebo que la terminaci�n del dominio sea correcta 
                    if (strlen($term_dom) > 1 && strlen($term_dom) < 5 && (!strstr($term_dom, "@"))) {
                        //compruebo que lo de antes del dominio sea correcto 
                        $antes_dom = substr($email, 0, strlen($email) - strlen($term_dom) - 1);
                        $caracter_ult = substr($antes_dom, strlen($antes_dom) - 1, 1);
                        if ($caracter_ult != "@" && $caracter_ult != ".") {
                            $mail_correcto = 1;
                        }
                    }
                }
            }
        }
        if ($mail_correcto)
            return true;
        else
            return false;
    }

    function _isLogged() {
        if (($this->session->userdata('estado') != 1) || ($this->session->userdata('perfil') != 'becario')) {
            redirect('Becario');
        }
    }

}

?>
