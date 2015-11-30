<?php

class Funcionario extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('funcionarioLogin');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->_isLogged();
    }

    function index() {
        $data['titulo'] = 'Inicio';
        $data['menu'] = 'inicio';
        $data['contenido'] = 'loginFuncionario';
        $this->load->view('includes/template', $data);
    }

    function login() {
        $this->form_validation->set_rules('cedulaFun', 'cedula', 'required');
        $this->form_validation->set_rules('contrasena', 'contrasena', 'required|callback__validarFuncionario');
        $this->form_validation->set_rules('asignaturaFun', 'asignatura', 'required|callback__validarAsignatura');
        $this->form_validation->set_rules('programaFun', 'programa', 'required|callback__validarPrograma');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        $this->form_validation->set_message('_validarFuncionario', 'Contrase&ntilde;a incorrecta.');
        $this->form_validation->set_message('_validarAsignatura', 'Asignatura incorrecta.');
        $this->form_validation->set_message('_validarPrograma', 'Programa incorrecto.');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            
                date_default_timezone_set('America/Bogota');
                $cedula = $this->input->post('cedulaFun');
                $contrasena = $this->funcionarioLogin->devovlerCotrasena($cedula);

                if ($cedula == $contrasena) {
                    redirect('funcionario/cambioContrasena');
                } else {
                    $fecha = date("Y-m-d");
                    $hora_inicio = date("H:i:s");
                    $practica = $this->funcionarioLogin->devolverCodigoPractica($this->input->post('practicas'));
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $cod_pc = $this->funcionarioLogin->devolverCod_pcIP($ip);
                    $cod_prog = $this->input->post('programaFun');
                    $cod_asg = $this->input->post('asignaturaFun');
                    $this->funcionarioLogin->nuevoRegistro($fecha, $hora_inicio, $cedula, $practica, $cod_pc, $cod_asg, $cod_prog);
                    $sesionCookie = array(
                        'perfil' => 'funcionario',
                        'estado' => '1',
                        'datos' => $this->funcionarioLogin->datosFuncionarios($cedula)
                    );
                    $this->session->set_userdata($sesionCookie);
                    redirect('inicioFuncionario');
                }
            
        }
    }

    function cambioContrasena() {
        $data['titulo'] = 'Cambio Contrasena';
        $data['menu'] = 'funcionario';
        $data['contenido'] = 'cambioContrasena';
        $this->load->view('includes/template', $data);
    }

    function actulizarContrasena() {

        $contrasena = $this->input->post('contNueva');
        $contrasena1 = $this->input->post('contNueva2');
        $contrasenavieja = $this->input->post('contrasenavieja');
        
        if ($contrasena == "" || $contrasena1 == ""  || $contrasenavieja == " ")
        redirect('funcionario/cambioContrasena');
        
        if ($contrasena == $contrasena1) {
            $contra = md5($contrasena);
            $this->funcionarioLogin->cambioContrasena($contra, $contrasenavieja);
            redirect('funcionario/confirmacionDatos');
        } else {
            redirect('funcionario/cambioContrasena');
        }
    }

    function confirmacionDatos() {
        $data['titulo'] = 'Cambio Contrasena';
        $data['menu'] = 'funcionario';
        $data['contenido'] = 'confirmacionDatos';
        $this->load->view('includes/template', $data);
    }

    function _validarFuncionario() {
        $cedula = $this->input->post('cedulaFun');
        $contrasena = $this->input->post('contrasena');

        if ($cedula == $contrasena) {
            if ($this->funcionarioLogin->validarFuncionario($cedula, $contrasena)) {
                return true;
            } else {
                return false;
            }
        } else {
            $contra = md5($contrasena);
            if ($this->funcionarioLogin->validarFuncionario($cedula, $contra)) {
                return true;
            } else {
                return false;
            }
        }
    }

    function validacionUsuarioAjax() {
        if ($this->input->is_ajax_request()) {
            $cedula = $this->input->post('cedula');
            if ($this->funcionarioLogin->validarUsuario($cedula)) {
                echo 'true';
            } else {
                echo 'false';
            }
        } else {
            echo 'acceso denegado';
        }
    }

    function validacionAsignaturaAjax() {
        if ($this->input->is_ajax_request()) {
            $asg = $this->input->post('asignatura');
            if ($this->funcionarioLogin->validarAsignatura($asg)) {
                echo 'true';
            } else {
                echo 'false';
            }
        } else {
            echo 'acceso denegado';
        }
    }

    function validacionProgramaAjax() {
        if ($this->input->is_ajax_request()) {
            $prog = $this->input->post('programa');
            if ($this->funcionarioLogin->validarPrograma($prog)) {
                echo 'true';
            } else {
                echo 'false';
            }
        } else {
            echo 'acceso denegado';
        }
    }

    function _validarAsignatura() {
        $asg = $this->input->post('asignaturaFun');
        if ($this->funcionarioLogin->validarAsignatura($asg)) {
            return true;
        } else {
            return false;
        }
    }

    function _validarPrograma() {
        $prog = $this->input->post('programaFun');
        if ($this->funcionarioLogin->validarPrograma($prog)) {
            return true;
        } else {
            return false;
        }
    }

    function _isLogged() {
        if (($this->session->userdata('estado') == 1) && ($this->session->userdata('perfil') == 'funcionario')) {
            redirect('inicioFuncionario');
        }

        if ($this->session->userdata('estado') == 1 && ($this->session->userdata('perfil') != 'funcionario')) {
            redirect('inicio'); //Corregir para redireccionar al index de toda la pagina
        }
    }
    
    function checkPassAjax() {
        if ($this->input->is_ajax_request()) {
            $cedula = $this->session->userdata('cedula');
            $contrasena = $this->input->post('contrasenavieja');
            //if ($this->funcionarioLogin->validarFuncionario($cedula, $contrasena)) {
            if ($cedula != $contrasena) {    
                echo 'true';
            } else {
                echo 'false';
            }
        } else {
            echo 'acceso denegado';
        }
    }

}

?>
