<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class InicioAdministrador extends CI_Controller {

    function __construct() {
        date_default_timezone_set('America/Bogota');
        parent::__construct();
        $this->_isLogged();
        $this->load->model('modelAdmin');
        $this->load->model('estudianteLogin');

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('pagination'); //cargamos la libreria de paginacion
        $this->load->library('table'); //cargamos la libreria para el manejo de tablas
        $this->load->library('calendar');
    }

    public function index() {
        
    }

    public function inicioGestionBecario() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'inicioGestionBecario';
        $this->load->view('includes/template', $data);
    }

    public function inicioGestionEstudiante() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'inicioGestionEstudiante';
        $this->load->view('includes/template', $data);
    }

    public function AdicionarEstudiante() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'adicionarEstudiante';
        $data['datos'] = $this->modelAdmin->ListarProgramas();
        $this->load->view('includes/templateB', $data);
        ;
    }

    public function registrarEstudiante() {

        $this->form_validation->set_rules('estudiantes_codigo', 'codigo de usuario', 'required');
        $this->form_validation->set_rules('nombre', 'nombre de usuario', 'required');
        $this->form_validation->set_rules('telefono', 'telefono de usuario', 'required');
        $this->form_validation->set_rules('direccion', 'direccion de usuario', 'required');
        $this->form_validation->set_rules('correo', 'correo de usuario', 'required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');


        if ($this->form_validation->run() == FALSE) {
            $this->AdicionarEstudiante();
        } else {
            $codigo = $this->input->post('estudiantes_codigo');
            $nombre = $this->input->post('nombre');
            $telefono = $this->input->post('telefono');
            $direccion = $this->input->post('direccion');
            $correo = $this->input->post('correo');
            $programa = $this->input->post('Programa');
            $this->modelAdmin->insertarEstudiante($codigo, $programa, $nombre, $telefono, $direccion, $correo);
            redirect('inicioAdministrador/estudianteRegistrado');
        }
    }

    public function estudianteRegistrado() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'estudianteRegistrado';
        $this->load->view('includes/template', $data);
    }

    public function actualizarEstudiante() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'actualizarEstudiante';
        $this->load->view('includes/template', $data);

        $this->form_validation->set_rules('codUsuEstudiante', 'codigo de usuario', 'trim|required');
        $this->form_validation->set_rules('telUsuario', 'tel de usuario', 'trim|required');
        $this->form_validation->set_rules('dirUsuario', 'dire de usuario', 'trim|required');
        $this->form_validation->set_rules('correoUsuario', 'correo de usuario', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $codigo = $_POST['codUsuEstudiante'];
            $telefono = $_POST['telUsuario'];
            $direccion = $_POST['dirUsuario'];
            $correo = $_POST['correoUsuario'];
            //$datos = $this->becario->datosEstudiante($codigo);
            $this->modelAdmin->actualizarBecario($codigo, $telefono, $direccion, $correo);
            redirect('inicioAdministrador/estudianteActualizado');
        }
    }

    public function estudianteActualizado() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'estudianteActualizado';
        $this->load->view('includes/template', $data);
    }

    /* function _validarCodigoUsr($codigo) {
      return $this->becario->validarUsuario($codigo);
      } */

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

    public function inicioGestionFuncionario() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'inicioGestionFuncionario';
        $this->load->view('includes/template', $data);
    }

    public function inicioGestionEquipo() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'inicioGestionEquipo';
        $this->load->view('includes/template', $data);
    }

    public function actualizarContrasenaBecario() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'actualizarContrasenaBecario';
        $data['datos'] = $this->modelAdmin->devolverCodigosBecarios();
        $this->load->view('includes/templateB', $data);
        $this->form_validation->set_rules('contrasena', 'Contraseña', 'trim|required');
        //$this->form_validation->set_rules('contrasenaAntigua', 'Contraseña Antigua', 'trim|required|__validarContrasena');
        $this->form_validation->set_rules('codigoBeca', 'Codigo Becario', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

            $estudiantes_codigo = $this->input->post('codigoBeca');

            $contrasenaNueva = $this->input->post('contrasena');

            $this->modelAdmin->actualizarContrasena($contrasenaNueva, $estudiantes_codigo);
            redirect('inicioAdministrador/contrasenaCambiada');
        }
    }

    public function adicionarBecario() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'adicionarBecario';
        $data['datos'] = $this->modelAdmin->devolverCodigosEstudiantesNoBecarios();
        $this->load->view('includes/templateB', $data);

        $this->form_validation->set_rules('codBec', 'codigo del becario', 'trim|required');
        $this->form_validation->set_rules('cargo', 'cargo', 'trim|required');
        $this->form_validation->set_rules('contrasena', 'contrasena', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

            $codigo = $this->input->post('codBec');
            $cargo = $this->input->post('cargo');
            $contrasena = $this->input->post('contrasena');
            $this->modelAdmin->adicionarBecarios($codigo, $cargo, $contrasena);
            redirect('inicioAdministrador/becarioAgregado');
        }
    }

    public function adicionarEquipo() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'adicionarEquipo';
        $data['datos'] = $this->modelAdmin->devolverCodigosSalas();
        $this->load->view('includes/templateB', $data);
        $this->form_validation->set_rules('salas_Cod_sala', 'codigo de la sala', 'trim|required');
        $this->form_validation->set_rules('ip', 'ip del computador', 'trim|required');
        $this->form_validation->set_rules('nombre_comp', 'nombre del computador', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $salas_Cod_sala = $this->input->post('salas_Cod_sala');
            $ip = $this->input->post('ip');
            $nombre_comp = $this->input->post('nombre_comp');
            $this->modelAdmin->adicionarEquipos($salas_Cod_sala, $ip, $nombre_comp);
            redirect('inicioAdministrador/equipoAgregado');
        }
    }

    public function actualizarBecario() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'actualizarBecario';
        $this->load->view('includes/template', $data);
        $this->form_validation->set_rules('codUsuarioB', 'codigo de usuario', 'trim|required');
        $this->form_validation->set_rules('telUsuarioB', 'codigo de usuario', 'trim|required');
        $this->form_validation->set_rules('dirUsuarioB', 'codigo de usuario', 'trim|required');
        $this->form_validation->set_rules('correo', 'codigo de usuario', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        $this->form_validation->set_message('_validarCodigo', 'El %s no existe');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $codigo = $_POST['codUsuarioB'];
            $telefono = $_POST['telUsuarioB'];
            $direccion = $_POST['dirUsuarioB'];
            $correo = $_POST['correo'];

            $this->modelAdmin->actualizarBecario($codigo, $telefono, $direccion, $correo);
            redirect('inicioAdministrador/becarioActualizado');
        }
    }

    public function actualizarEquipo() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'actualizarEquipo';
        $this->load->view('includes/template', $data);
        $this->form_validation->set_rules('codigopc', 'codigo pc', 'trim|required');
        $this->form_validation->set_rules('codigosala', 'codigo de la sala', 'trim|required');
        $this->form_validation->set_rules('ip', 'ip del computador', 'trim|required');
        $this->form_validation->set_rules('nombrepc', 'nombre del computador', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $codigopc = $this->input->post('codigopc');
            $salas_Cod_sala = $this->input->post('codigosala');
            $ip = $this->input->post('ip');
            $nombre_comp = $this->input->post('nombrepc');

            $this->modelAdmin->actualizarEquipos($codigopc, $salas_Cod_sala, $ip, $nombre_comp);
            redirect('inicioAdministrador/equipoActualizado');
        }
    }

    public function finalizarFuncionario() {

        $data['titulo'] = 'Sesion Admisnitrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'finalizarFuncionario';
        $this->load->view('includes/template', $data);

        $this->form_validation->set_rules('observacion', 'observacion', 'trim|required');
        $this->form_validation->set_message('required', 'El campo es requerido');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

            $observacion = $this->input->post('observacion');
            $horasalida = date("H:i:s");

            $this->modelAdmin->finalizarFuncionario($horasalida, $observacion);
            redirect('inicioAdministrador/jornadaFuncionarioFinalizada');
        }
    }

    function jornadaFuncionarioFinalizada() {

        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'jornadaFuncionarioFinalizada';
        $this->load->view('includes/template', $data);
    }

    public function contrasenaCambiada() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'contrasenaCambiada';
        $this->load->view('includes/template', $data);
    }

    public function contrasenaIncorrecta() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'contrasenaIncorrecta';
        $this->load->view('includes/template', $data);
    }

    public function becarioAgregado() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'becarioAgregado';
        $this->load->view('includes/template', $data);
    }

    public function becarioActualizado() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'becarioActualizado';
        $this->load->view('includes/template', $data);
    }

    public function equipoAgregado() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'equipoAgregado';
        $this->load->view('includes/template', $data);
    }

    public function equipoActualizado() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'equipoActualizado';
        $this->load->view('includes/template', $data);
    }

    public function sancionInsertada() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'sancionInsertada';
        $this->load->view('includes/template', $data);
    }

    public function sancionActualizada() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'sancionActualizada';
        $this->load->view('includes/template', $data);
    }

    public function sanciones() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'InsertarSancion';
        $data['datos'] = $this->modelAdmin->devolverCodigosEstudiantes();
        $this->load->view('includes/templateB', $data);
        $this->form_validation->set_rules('codEst', 'codigo estudiante', 'trim|required');
        $this->form_validation->set_rules('descripcion', 'Descripcion', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $estcodigo = $this->input->post('codEst');
            $descripcion = $this->input->post('descripcion');
            $fechaSancion = date("Y-m-d");
            $this->modelAdmin->insertarSancion($estcodigo, $descripcion, $fechaSancion);
            redirect('inicioAdministrador/sancionInsertada');
        }
    }

    public function pazysalvo() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'pazysalvo';


        $pages = 5;

        $config['base_url'] = base_url() . 'inicioAdministrador/pazysalvo'; // parametro base de la aplicación
        $config['total_rows'] = $this->modelAdmin->devolverTotalSanciones();
        $config['per_page'] = $pages;
        $config['num_links'] = 3; //Numero de links mostrados en la paginación

        $this->pagination->initialize($config);
        $data['records'] = $this->modelAdmin->devolverSanciones($config['per_page'], $this->uri->segment(3));


        $data['datos'] = $this->modelAdmin->devolverCodigosSanciones();
        $this->load->view('includes/templateB', $data);

        $this->form_validation->set_rules('sancion', 'Sancion', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');


        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

            $sancion = $this->input->post('sancion');
            $this->modelAdmin->actualizarSancion($sancion);
            $data['sancion'] = $sancion;
            $data["records"] = $this->modelAdmin->devolverSancionesPDF($sancion);
            $this->load->view('includes/reportes/pdfpazysalvo', $data);
        }
    }

    /* Reportes */

    public function inicioReportes() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'inicioReportesPDF';
        $this->load->view('includes/template', $data);
    }

    public function inicioReportesExcel() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'inicioReportesExcel';
        $this->load->view('includes/template', $data);
    }

    public function topdfreporteRegistrosBecarios() {

        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'reporteRegistrosBecarios';
        $this->load->view('includes/template', $data);

        $this->form_validation->set_rules('fechainicio', 'Fecha Inicio', 'trim|required');
        $this->form_validation->set_rules('fechafin', 'Fecha Fin', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $fechainicio = $this->input->post('fechainicio');
            $fechafin = $this->input->post('fechafin');
            $data["records"] = $this->modelAdmin->devolverRegistrosBecarios($fechainicio, $fechafin);
            $data["fechainicio"] = $fechainicio;
            $data["fechafin"] = $fechafin;
            $this->load->view('includes/reportes/pdfreporteRegistrosBecarios', $data);
        }
    }

    public function excelreporteRegistrosBecarios() {

        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'reporteRegistrosBecariosExc';
        $this->load->view('includes/template', $data);
    }

    public function descargarExcelReporteRegistrosBecarios() {

        $this->form_validation->set_rules('fechainicio', 'Fecha Inicio', 'trim|required');
        $this->form_validation->set_rules('fechafin', 'Fecha Fin', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $fechainicio = $this->input->post('fechainicio');
            $fechafin = $this->input->post('fechafin');
            $datos["records"] = $this->modelAdmin->devolverRegistrosBecarios($fechainicio, $fechafin);

            $this->load->view('includes/reportes/excelreporteRegistrosBecarios', $datos);
        }
    }

    public function topdfregistrosUnBecario() {

        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'reporteRegistroUnBecario';

        $data['datos'] = $this->modelAdmin->devolverCodigosBecarios();
        $this->load->view('includes/templateB', $data);


        $this->form_validation->set_rules('fechainicio', 'Fecha Inicio', 'trim|required');
        $this->form_validation->set_rules('fechafin', 'Fecha Fin', 'trim|required');
        $this->form_validation->set_rules('codigoB', 'Codigo', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $fechainicio = $this->input->post('fechainicio');
            $fechafin = $this->input->post('fechafin');
            $codigo = $this->input->post('codigoB');
            $data["records"] = $this->modelAdmin->devolverRegistrosUnBecario($fechainicio, $fechafin, $codigo);
            $data["fechainicio"] = $fechainicio; //para enviar a pdfreporteRegistrosUnBecario
            $data["fechafin"] = $fechafin; //para enviar a pdfreporteRegistrosUnBecario
            $data["codigo"] = $codigo; //para enviar a pdfreporteRegistrosUnBecario
            $this->load->view('includes/reportes/pdfreporteRegistrosUnBecario', $data);
        }
    }

    public function excelreporteRegistrosUnBecario() {

        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'reporteRegistroUnBecarioExc';
        $data['datos'] = $this->modelAdmin->devolverCodigosBecarios();
        $this->load->view('includes/templateB', $data);
    }

    public function descargarExcelReporteRegistrosUnBecario() {

        $this->form_validation->set_rules('fechainicio', 'Fecha Inicio', 'trim|required');
        $this->form_validation->set_rules('fechafin', 'Fecha Fin', 'trim|required');
        $this->form_validation->set_rules('codigoB', 'Codigo', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $fechainicio = $this->input->post('fechainicio');
            $fechafin = $this->input->post('fechafin');
            $codigo = $this->input->post('codigoB');
            $datos["records"] = $this->modelAdmin->devolverRegistrosUnBecario($fechainicio, $fechafin, $codigo);

            $this->load->view('includes/reportes/excelreporteRegistrosUnBecario', $datos);
        }
    }

    public function topdfreporteRegistrosUsuarios() {

        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'reporteRegistrosUsuarios';
        $this->load->view('includes/template', $data);

        $this->form_validation->set_rules('fechainicio', 'Fecha Inicio', 'trim|required');
        $this->form_validation->set_rules('fechafin', 'Fecha Fin', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $fechainicio = $this->input->post('fechainicio');
            $fechafin = $this->input->post('fechafin');
            $data["records"] = $this->modelAdmin->devolverRegistrosUsuarios($fechainicio, $fechafin);
            $data["fechainicio"] = $fechainicio;
            $data["fechafin"] = $fechafin;
            $this->load->view('includes/reportes/pdfreporteRegistrosUsuarios', $data);
        }
    }

    public function excelreporteRegistrosUsuarios() {

        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'reporteRegistrosUsuariosExc';
        $this->load->view('includes/template', $data);
    }

    public function descargarExcelReporteRegistrosUsuarios() {

        $this->form_validation->set_rules('fechainicio', 'Fecha Inicio', 'trim|required');
        $this->form_validation->set_rules('fechafin', 'Fecha Fin', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $fechainicio = $this->input->post('fechainicio');
            $fechafin = $this->input->post('fechafin');
            $datos["records"] = $this->modelAdmin->devolverRegistrosUsuarios($fechainicio, $fechafin);

            $this->load->view('includes/reportes/excelreporteRegistrosUsuarios', $datos);
        }
    }

    public function topdfreporteRegistrosFuncionarios() {

        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'reporteRegistrosFuncionarios';
        $this->load->view('includes/template', $data);

        $this->form_validation->set_rules('fechainicio', 'Fecha Inicio', 'trim|required');
        $this->form_validation->set_rules('fechafin', 'Fecha Fin', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $fechainicio = $this->input->post('fechainicio');
            $fechafin = $this->input->post('fechafin');
            $data["records"] = $this->modelAdmin->devolverRegistrosFuncionarios($fechainicio, $fechafin);
            $data["fechainicio"] = $fechainicio;
            $data["fechafin"] = $fechafin;
            $this->load->view('includes/reportes/pdfreporteRegistrosFuncionarios', $data);
        }
    }

    public function excelreporteRegistrosFuncionarios() {

        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'reporteRegistrosFuncionariosExc';
        $this->load->view('includes/template', $data);
    }

    public function descargarExcelReporteRegistrosFuncionarios() {

        $this->form_validation->set_rules('fechainicio', 'Fecha Inicio', 'trim|required');
        $this->form_validation->set_rules('fechafin', 'Fecha Fin', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $fechainicio = $this->input->post('fechainicio');
            $fechafin = $this->input->post('fechafin');
            $datos["records"] = $this->modelAdmin->devolverRegistrosFuncionarios($fechainicio, $fechafin);

            $this->load->view('includes/reportes/excelreporteRegistrosFuncionarios', $datos);
        }
    }

    public function topdfregistrosUnFuncionario() {

        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'reporteRegistroUnFuncionario';
        $data['datos'] = $this->modelAdmin->devolverCodigosFuncionarios();
        $this->load->view('includes/templateB', $data);


        $this->form_validation->set_rules('fechainicio', 'Fecha Inicio', 'trim|required');
        $this->form_validation->set_rules('fechafin', 'Fecha Fin', 'trim|required');
        $this->form_validation->set_rules('codigoF', 'Codigo', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $fechainicio = $this->input->post('fechainicio');
            $fechafin = $this->input->post('fechafin');
            $codigo = $this->input->post('codigoF');
            $data["records"] = $this->modelAdmin->devolverRegistrosUnFuncionario($fechainicio, $fechafin, $codigo);
            $data["fechainicio"] = $fechainicio; //para enviar a pdfreporteRegistrosUnFuncionario
            $data["fechafin"] = $fechafin; //para enviar a pdfreporteRegistrosUnFuncionario
            $data["codigo"] = $codigo; //para enviar a pdfreporteRegistrosUnFuncionario
            $this->load->view('includes/reportes/pdfreporteRegistrosUnFuncionario', $data);
        }
    }

    public function excelreporteRegistrosUnFuncionario() {

        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'reporteRegistroUnFuncionarioExc';
        $data['datos'] = $this->modelAdmin->devolverCodigosFuncionarios();
        $this->load->view('includes/templateB', $data);
    }

    public function descargarExcelReporteRegistrosUnFuncionario() {

        $this->form_validation->set_rules('fechainicio', 'Fecha Inicio', 'trim|required');
        $this->form_validation->set_rules('fechafin', 'Fecha Fin', 'trim|required');
        $this->form_validation->set_rules('codigoF', 'Codigo', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $fechainicio = $this->input->post('fechainicio');
            $fechafin = $this->input->post('fechafin');
            $codigo = $this->input->post('codigoF');
            $datos["records"] = $this->modelAdmin->devolverRegistrosUnFuncionario($fechainicio, $fechafin, $codigo);

            $this->load->view('includes/reportes/excelreporteRegistrosUnFuncionario', $datos);
        }
    }

    public function topdfreporteSanciones() {

        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'reporteSancionSalas';
        $this->load->view('includes/template', $data);

        $this->form_validation->set_rules('fechainicio', 'Fecha Inicio', 'trim|required');
        $this->form_validation->set_rules('fechafin', 'Fecha Fin', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $fechainicio = $this->input->post('fechainicio');
            $fechafin = $this->input->post('fechafin');
            $data["records"] = $this->modelAdmin->devolverSancionesEst($fechainicio, $fechafin);
            $data["fechainicio"] = $fechainicio;
            $data["fechafin"] = $fechafin;
            $this->load->view('includes/reportes/pdfreporteSanciones', $data);
        }
    }

    public function excelreporteSanciones() {

        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'reporteSancionSalasExc';
        $this->load->view('includes/template', $data);
    }

    public function descargarExcelReporteSanciones() {

        $this->form_validation->set_rules('fechainicio', 'Fecha Inicio', 'trim|required');
        $this->form_validation->set_rules('fechafin', 'Fecha Fin', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $fechainicio = $this->input->post('fechainicio');
            $fechafin = $this->input->post('fechafin');
            $datos["records"] = $this->modelAdmin->devolverSancionesEst($fechainicio, $fechafin);

            $this->load->view('includes/reportes/excelreporteSanciones', $datos);
        }
    }

    /* FIN Reportes */

    function _buscar($arreglo, $elemento) {
        for ($i = 0; $i < sizeof($arreglo); $i++) {
            if ($arreglo[$i] == $elemento) {
                return true;
            }
        }
        return false;
    }

    function _totalesSalasEstudiantes($registros, $salas) {
        $manana = strtotime('06:00:00');
        $tarde = strtotime('12:00:00');
        $noche = strtotime('18:00:00');
        $salasManana = $salas;
        $salasTarde = $salas;
        $salasNoche = $salas;
        for ($i = 0; $i < sizeof($registros); $i++) {
            $registro = $registros[$i];
            if (strtotime($registro['hora_ing']) >= $manana && strtotime($registro['hora_ing']) < $tarde) {
                for ($j = 0; $j < sizeof($salasManana); $j++) {
                    if ($salasManana[$j]['nom_sala'] == $registro['nom_sala']) {
                        if (!isset($salasManana[$j]['usuarios'])) {
                            $salasManana[$j]['usuarios'][] = $registro['estudiante_codigo'];
                        } else {
                            if (!$this->_buscar($salasManana[$j]['usuarios'], $registro['estudiante_codigo'])) {
                                $salasManana[$j]['usuarios'][] = $registro['estudiante_codigo'];
                            }
                        }
                    }
                }
            } else {
                if (strtotime($registro['hora_ing']) >= $tarde && strtotime($registro['hora_ing']) < $noche) {
                    for ($j = 0; $j < sizeof($salasTarde); $j++) {
                        if ($salasTarde[$j]['nom_sala'] == $registro['nom_sala']) {
                            if (!isset($salasTarde[$j]['usuarios'])) {
                                $salasTarde[$j]['usuarios'][] = $registro['estudiante_codigo'];
                            } else {
                                if (!$this->_buscar($salasTarde[$j]['usuarios'], $registro['estudiante_codigo'])) {
                                    $salasTarde[$j]['usuarios'][] = $registro['estudiante_codigo'];
                                }
                            }
                        }
                    }
                } else {
                    if (strtotime($registro['hora_ing']) >= $noche || strtotime($registro['hora_ing']) < $manana) {
                        for ($j = 0; $j < sizeof($salasNoche); $j++) {
                            if ($salasNoche[$j]['nom_sala'] == $registro['nom_sala']) {
                                if (!isset($salasNoche[$j]['usuarios'])) {
                                    $salasNoche[$j]['usuarios'][] = $registro['estudiante_codigo'];
                                } else {
                                    if (!$this->_buscar($salasNoche[$j]['usuarios'], $registro['estudiante_codigo'])) {
                                        $salasNoche[$j]['usuarios'][] = $registro['estudiante_codigo'];
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        //////Sacar totales//////
        for ($i = 0; $i < sizeof($salasManana); $i++) {
            if (!isset($salasManana[$i]['usuarios'])) {
                $salasManana[$i]['total'] = '0';
            } else {
                $salasManana[$i]['total'] = sizeof($salasManana[$i]['usuarios']);
            }
            if (!isset($salasTarde[$i]['usuarios'])) {
                $salasTarde[$i]['total'] = '0';
            } else {
                $salasTarde[$i]['total'] = sizeof($salasTarde[$i]['usuarios']);
            }
            if (!isset($salasNoche[$i]['usuarios'])) {
                $salasNoche[$i]['total'] = '0';
            } else {
                $salasNoche[$i]['total'] = sizeof($salasNoche[$i]['usuarios']);
            }
        }
        ///////////////////////
        $totalSala['manana'] = $salasManana;
        $totalSala['tarde'] = $salasTarde;
        $totalSala['noche'] = $salasNoche;
        return $totalSala;
    }

    function _totalesSalasFuncionarios($registros, $salas) {
        $manana = strtotime('06:00:00');
        $tarde = strtotime('12:00:00');
        $noche = strtotime('18:00:00');
        $salasManana = $salas;
        $salasTarde = $salas;
        $salasNoche = $salas;
        for ($i = 0; $i < sizeof($registros); $i++) {
            $registro = $registros[$i];
            if (strtotime($registro['hora_ing']) >= $manana && strtotime($registro['hora_ing']) < $tarde) {
                for ($j = 0; $j < sizeof($salasManana); $j++) {
                    if ($salasManana[$j]['nom_sala'] == $registro['nom_sala']) {
                        if (!isset($salasManana[$j]['usuarios'])) {
                            $salasManana[$j]['usuarios'][] = $registro['funcionario_Cedula'];
                        } else {
                            if (!$this->_buscar($salasManana[$j]['usuarios'], $registro['funcionario_Cedula'])) {
                                $salasManana[$j]['usuarios'][] = $registro['funcionario_Cedula'];
                            }
                        }
                    }
                }
            } else {
                if (strtotime($registro['hora_ing']) >= $tarde && strtotime($registro['hora_ing']) < $noche) {
                    for ($j = 0; $j < sizeof($salasTarde); $j++) {
                        if ($salasTarde[$j]['nom_sala'] == $registro['nom_sala']) {
                            if (!isset($salasTarde[$j]['usuarios'])) {
                                $salasTarde[$j]['usuarios'][] = $registro['funcionario_Cedula'];
                            } else {
                                if (!$this->_buscar($salasTarde[$j]['usuarios'], $registro['funcionario_Cedula'])) {
                                    $salasTarde[$j]['usuarios'][] = $registro['funcionario_Cedula'];
                                }
                            }
                        }
                    }
                } else {
                    if (strtotime($registro['hora_ing']) >= $noche || strtotime($registro['hora_ing']) < $manana) {
                        for ($j = 0; $j < sizeof($salasNoche); $j++) {
                            if ($salasNoche[$j]['nom_sala'] == $registro['nom_sala']) {
                                if (!isset($salasNoche[$j]['usuarios'])) {
                                    $salasNoche[$j]['usuarios'][] = $registro['funcionario_Cedula'];
                                } else {
                                    if (!$this->_buscar($salasNoche[$j]['usuarios'], $registro['funcionario_Cedula'])) {
                                        $salasNoche[$j]['usuarios'][] = $registro['funcionario_Cedula'];
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        //////Sacar totales//////
        for ($i = 0; $i < sizeof($salasManana); $i++) {
            if (!isset($salasManana[$i]['usuarios'])) {
                $salasManana[$i]['total'] = '0';
            } else {
                $salasManana[$i]['total'] = sizeof($salasManana[$i]['usuarios']);
            }
            if (!isset($salasTarde[$i]['usuarios'])) {
                $salasTarde[$i]['total'] = '0';
            } else {
                $salasTarde[$i]['total'] = sizeof($salasTarde[$i]['usuarios']);
            }
            if (!isset($salasNoche[$i]['usuarios'])) {
                $salasNoche[$i]['total'] = '0';
            } else {
                $salasNoche[$i]['total'] = sizeof($salasNoche[$i]['usuarios']);
            }
        }
        ///////////////////////
        $totalSala['manana'] = $salasManana;
        $totalSala['tarde'] = $salasTarde;
        $totalSala['noche'] = $salasNoche;
        return $totalSala;
    }

    function _totalesSalasBecarios($registros, $salas) {
        $manana = strtotime('06:00:00');
        $tarde = strtotime('12:00:00');
        $noche = strtotime('18:00:00');
        $salasManana = $salas;
        $salasTarde = $salas;
        $salasNoche = $salas;
        for ($i = 0; $i < sizeof($registros); $i++) {
            $registro = $registros[$i];
            if (strtotime($registro['hora_ing']) >= $manana && strtotime($registro['hora_ing']) < $tarde) {
                for ($j = 0; $j < sizeof($salasManana); $j++) {
                    if ($salasManana[$j]['nom_sala'] == $registro['nom_sala']) {
                        if (!isset($salasManana[$j]['usuarios'])) {
                            $salasManana[$j]['usuarios'][] = $registro['becarios_Estudiantes_Codigo'];
                        } else {
                            if (!$this->_buscar($salasManana[$j]['usuarios'], $registro['becarios_Estudiantes_Codigo'])) {
                                $salasManana[$j]['usuarios'][] = $registro['becarios_Estudiantes_Codigo'];
                            }
                        }
                    }
                }
            } else {
                if (strtotime($registro['hora_ing']) >= $tarde && strtotime($registro['hora_ing']) < $noche) {
                    for ($j = 0; $j < sizeof($salasTarde); $j++) {
                        if ($salasTarde[$j]['nom_sala'] == $registro['nom_sala']) {
                            if (!isset($salasTarde[$j]['usuarios'])) {
                                $salasTarde[$j]['usuarios'][] = $registro['becarios_Estudiantes_Codigo'];
                            } else {
                                if (!$this->_buscar($salasTarde[$j]['usuarios'], $registro['becarios_Estudiantes_Codigo'])) {
                                    $salasTarde[$j]['usuarios'][] = $registro['becarios_Estudiantes_Codigo'];
                                }
                            }
                        }
                    }
                } else {
                    if (strtotime($registro['hora_ing']) >= $noche || strtotime($registro['hora_ing']) < $manana) {
                        for ($j = 0; $j < sizeof($salasNoche); $j++) {
                            if ($salasNoche[$j]['nom_sala'] == $registro['nom_sala']) {
                                if (!isset($salasNoche[$j]['usuarios'])) {
                                    $salasNoche[$j]['usuarios'][] = $registro['becarios_Estudiantes_Codigo'];
                                } else {
                                    if (!$this->_buscar($salasNoche[$j]['usuarios'], $registro['becarios_Estudiantes_Codigo'])) {
                                        $salasNoche[$j]['usuarios'][] = $registro['becarios_Estudiantes_Codigo'];
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        //////Sacar totales//////
        for ($i = 0; $i < sizeof($salasManana); $i++) {
            if (!isset($salasManana[$i]['usuarios'])) {
                $salasManana[$i]['total'] = '0';
            } else {
                $salasManana[$i]['total'] = sizeof($salasManana[$i]['usuarios']);
            }
            if (!isset($salasTarde[$i]['usuarios'])) {
                $salasTarde[$i]['total'] = '0';
            } else {
                $salasTarde[$i]['total'] = sizeof($salasTarde[$i]['usuarios']);
            }
            if (!isset($salasNoche[$i]['usuarios'])) {
                $salasNoche[$i]['total'] = '0';
            } else {
                $salasNoche[$i]['total'] = sizeof($salasNoche[$i]['usuarios']);
            }
        }
        ///////////////////////
        $totalSala['manana'] = $salasManana;
        $totalSala['tarde'] = $salasTarde;
        $totalSala['noche'] = $salasNoche;
        return $totalSala;
    }

    public function estadisticas() {
        $salas = $this->modelAdmin->listarSalas();
        $registrosFuncionarios = $this->modelAdmin->consultarRegistrosFuncionarios();
        $registrosEstudiantes = $this->modelAdmin->consultarRegistrosEstudiantes();
        $registrosBecarios = $this->modelAdmin->consultarRegistrosBecarios();
        $totalesFuncionarios = $this->_totalesSalasFuncionarios($registrosFuncionarios, $salas);
        $totalesEstudiantes = $this->_totalesSalasEstudiantes($registrosEstudiantes, $salas);
        $totalesBecarios = $this->_totalesSalasBecarios($registrosBecarios, $salas);
        $totales = $this->_totalesSalasBecarios($registrosBecarios, $salas);
        for ($i = 0; $i < sizeof($salas); $i++) {
            $totales['manana'][$i]['total'] = $totalesFuncionarios['manana'][$i]['total'] + $totalesBecarios['manana'][$i]['total'] + $totalesEstudiantes['manana'][$i]['total'];
            $totales['tarde'][$i]['total'] = $totalesFuncionarios['tarde'][$i]['total'] + $totalesBecarios['tarde'][$i]['total'] + $totalesEstudiantes['tarde'][$i]['total'];
            $totales['noche'][$i]['total'] = $totalesFuncionarios['noche'][$i]['total'] + $totalesBecarios['noche'][$i]['total'] + $totalesEstudiantes['noche'][$i]['total'];
        }
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'estadisticas';
        $data['manana'] = $totales['manana'];
        $data['tarde'] = $totales['tarde'];
        $data['noche'] = $totales['noche'];
        $this->load->view('includes/template', $data);
    }

    public function cerrarsesion() {


        $this->session->sess_destroy();
        redirect('estudiante/sesionCerrada');
    }

    function cambioContrasena() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'cambioContrasena';
        $this->load->view('includes/template', $data);
    }

    function checkPassAjax() {
        if ($this->input->is_ajax_request()) {
            $cedula = $this->session->userdata('cedula');
            $contrasena = $this->input->post('contActual');
            if ($this->modelAdmin->validarAdministrador($cedula, $contrasena)) {
                echo 'true';
            } else {
                echo 'false';
            }
        } else {
            echo 'acceso denegado';
        }
    }

    function checkPassBecarioAjax() {
        if ($this->input->is_ajax_request()) {
            $cedula = $this->input->post('codigo');
            $contrasena = $this->input->post('contActual');
            if ($this->modelAdmin->validarBecario($cedula, $contrasena)) {
                echo 'true';
            } else {
                echo 'false';
            }
        } else {
            echo 'acceso denegado';
        }
    }

    public function contrasenaAdminCambiada() {
        $cedula = $this->session->userdata('cedula');
        $contrasena = $this->input->post('contNueva2');
        $fecha = date('Y-m-d');
        $this->modelAdmin->actContAdmin($cedula, $contrasena, $fecha);
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'contrasenaCambiada';
        $this->load->view('includes/template', $data);
    }

    function solicitudCambioCont() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'solicitudCambio';
        $this->load->view('includes/template', $data);
    }

    function principal() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'principal';
        $this->load->view('includes/template', $data);
    }

    public function _validarContrasena($contrasenaAntigua, $estudiantes_codigo) {
        if ($this->modelAdmin->validarContrasena($contrasenaAntigua, $estudiantes_codigo) == true) {
            return false;
        } else {
            return true;
        }
    }

    public function _validarBecario($estudiantes_codigo) {
        if ($this->modelAdmin->validarBecario($estudiantes_codigo) == true) {
            return true;
        } else {
            return false;
        }
    }

//    function _validarCodigo($codigo) {
//        if ($this->modelAdmin->validarUsuario($codigo) == true) {
//            return true;
//        } else {
//            return false;
//        }
//    }

    function _validarCodigo($codigo) {
        return $this->modelAdmin->validarUsuario($codigo);
    }

    function validacionAjaxTelefono() {
        if ($this->input->is_ajax_request()) {
            $codigo = $this->input->post('codigo_usuario');
            if ($codigo == '') {
                echo 'vacio';
            } else {
                if ($this->modelAdmin->validarUsuario($codigo)) {

                    echo $this->modelAdmin->devolverTelefonoEstudiante($codigo);
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
                if ($this->modelAdmin->validarUsuario($codigo)) {

                    echo $this->modelAdmin->devolverDireccionEstudiante($codigo);
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
                if ($this->modelAdmin->validarUsuario($codigo)) {

                    echo $this->modelAdmin->devolverCorreoEstudiante($codigo);
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

    function validacionAjaxSala() {
        if ($this->input->is_ajax_request()) {
            $codigo = $this->input->post('codigo_pc');
            if ($codigo == '') {
                echo 'vacio';
            } else {
                if ($this->modelAdmin->validarPC($codigo)) {

                    echo $this->modelAdmin->devolverSalaComputador($codigo);
                } else {
                    echo 'FALSE';
                }
            }
        } else {
            echo 'acceso denegado';
        }
    }

    function validacionAjaxIP() {
        if ($this->input->is_ajax_request()) {
            $codigo = $this->input->post('codigo_pc');
            if ($codigo == '') {
                echo 'vacio';
            } else {
                if ($this->modelAdmin->validarPC($codigo)) {

                    echo $this->modelAdmin->devolverIPComputador($codigo);
                } else {
                    echo 'FALSE';
                }
            }
        } else {
            echo 'acceso denegado';
        }
    }

    function validacionAjaxNombrePC() {
        if ($this->input->is_ajax_request()) {
            $codigo = $this->input->post('codigo_pc');
            if ($codigo == '') {
                echo 'vacio';
            } else {
                if ($this->modelAdmin->validarPC($codigo)) {

                    echo $this->modelAdmin->devolverNombreComputador($codigo);
                } else {
                    echo 'FALSE';
                }
            }
        } else {
            echo 'acceso denegado';
        }
    }
    
    
      function validacionAjaxTelefono1() {
        if ($this->input->is_ajax_request()) {
            $codigo = $this->input->post('cedula');
            if ($codigo == '') {
                echo 'vacio';
            } else {
                if ($this->modelAdmin->validarFuncionario($codigo)) {

                    echo $this->modelAdmin->devolverTelefono1($codigo);
                } else {
                    echo 'FALSE';
                }
            }
        } else {
            echo 'acceso denegado';
        }
    }
    
    
     
      function validacionAjaxTelefono2() {
        if ($this->input->is_ajax_request()) {
            $codigo = $this->input->post('cedula');
            if ($codigo == '') {
                echo 'vacio';
            } else {
                if ($this->modelAdmin->validarFuncionario($codigo)) {

                    echo $this->modelAdmin->devolverTelefono2($codigo);
                } else {
                    echo 'FALSE';
                }
            }
        } else {
            echo 'acceso denegado';
        }
    }
    
    
       
      function validacionAjaxCorreoFun() {
        if ($this->input->is_ajax_request()) {
            $codigo = $this->input->post('cedula');
            if ($codigo == '') {
                echo 'vacio';
            } else {
                if ($this->modelAdmin->validarFuncionario($codigo)) {

                    echo $this->modelAdmin->devolverCorreoFun($codigo);
                } else {
                    echo 'FALSE';
                }
            }
        } else {
            echo 'acceso denegado';
        }
    }

    function _validarSancion($sancion) {

        return $this->modelAdmin->validarSancion($sancion);
    }

    function validacionSancion() {
        if ($this->input->is_ajax_request()) {
            $sancion = $this->input->post('cod_sancion');
            if ($sancion == '') {
                echo 'vacio';
            } else {
                if ($this->modelAdmin->validarSancion($sancion)) {
                    echo 'true';
                } else {
                    echo 'false';
                }
            }
        } else {
            echo 'acceso denegado';
        }
    }

    function verificarCodigoBecUnico() {
        if ($this->input->is_ajax_request()) {
            $codigo = $this->input->post('codigo');
            if ($this->modelAdmin->buscarCodigo($codigo)) {
                echo 'false';
            } else {
                echo 'true';
            }
        } else {
            echo 'acceso denegado';
        }
    }

    public function ingresarFuncionario() {
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'ingresarFuncionario';
        $data['datos'] = $this->modelAdmin->devolverCodigosFuncionariosEstadoNo();
        $this->load->view('includes/templateB', $data);


        $this->form_validation->set_rules('cedula', 'cedula', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');


        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

            $cedula = $_POST['cedula'];
            $estado = 1;

            $this->modelAdmin->guardar($cedula, $estado);
            redirect('inicioAdministrador/funcionarioActivado');
        }
    }

    public function funcionarioActivado() {
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'funcionarioActivado';
        $this->load->view('includes/template', $data);
    }

    public function ActualizarFuncionario() {

        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'ActualizarFuncionario';
        $this->load->view('includes/template', $data);


        $this->form_validation->set_rules('cedFuncionario', 'cedula', 'trim|required');
        $this->form_validation->set_rules('telefono1', 'telefono1', 'trim|required');
        $this->form_validation->set_rules('telefono2', 'telefono2', 'trim|required');
        $this->form_validation->set_rules('correo_fun', 'correo', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
       

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

            $cedula = $_POST['cedFuncionario'];
            $telefono1 = $_POST['telefono1'];
            $telefono2 = $_POST['telefono2'];
            $correo_fun = $_POST['correo_fun'];
       

            $this->modelAdmin->ActualizarFuncionario($cedula, $telefono1, $telefono2, $correo_fun);
              redirect('inicioAdministrador/funcionarioActualizado');
        }
    }
    
    public function funcionarioActualizado() {
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'funcionarioActualizado';
        $this->load->view('includes/template', $data);
    }

    //liberar pc


    public function consultaSalas() {
        $data = array();
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'consultarPcs';
        $data['datos'] = $this->modelAdmin->consutlarPcsUsados();
        $this->load->view('includes/template', $data);
    }

    function liberarPC($id, $codigo) {
        $fecha = date("H:i:s");
        $id_session = $this->modelAdmin->consultarSesion($codigo);
        $this->modelAdmin->cerrarSesionUsuario($id_session);
        $this->modelAdmin->actualizarHoraSalida($id, $fecha);
        redirect('inicioAdministrador/consultaSalas');
    }

    public function actualizacionSemestre() {
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'actualizacionSemestre';
        $this->load->view('includes/template', $data);
    }

    public function estadoDesactivado() {
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'estadosDesactivados';
        $this->load->view('includes/template', $data);
    }

    public function EstadosDesactivados() {

        $this->modelAdmin->cambiarEstadoEstudiantes();
        redirect('inicioAdministrador/estadoDesactivado');
    }

     public function importarFuncionarios() {
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'importarFuncionarios';
        $this->load->view('includes/template', $data);
    }
      public function cargarcsvFuncionario() {

        $target_path = "c:/uploads/";

        if (!(file_exists($target_path)))
            mkdir($target_path);

        $target_path = $target_path . $_FILES['userfile']['name'];

        move_uploaded_file($_FILES['userfile']['tmp_name'], $target_path);
        if (file_exists($target_path)) {
            $file = fopen($target_path, "r");

            while (($data = fgetcsv($file, 5000, ";")) !== FALSE) {
                if ($data[0] != 'Codigo')
                    if (!($this->modelAdmin->validarFuncionario($data[0])))
                        $this->modelAdmin->insertarDocente($data[0], $data[1], $data[2], $data[3], $data[4], $data[5],$data[6]);
            }
            redirect('inicioAdministrador/csvImportado');
        } else {
            redirect('inicioAdministrador/csvError');
        }
    }
    
    
    
    public function cargarcsv() {

        $target_path = "c:/uploads/";

        if (!(file_exists($target_path)))
            mkdir($target_path);

        $target_path = $target_path . $_FILES['userfile']['name'];

        move_uploaded_file($_FILES['userfile']['tmp_name'], $target_path);
        if (file_exists($target_path)) {
            $file = fopen($target_path, "r");

            while (($data = fgetcsv($file, 5000, ";")) !== FALSE) {
                if ($data[0] != 'Codigo')
                    if (!($this->modelAdmin->validarEstudiante($data[0])))
                        $this->modelAdmin->insertarEstudiante($data[0], $data[1], $data[2], $data[3], $data[4], $data[5],$data[6]);
            }
            redirect('inicioAdministrador/csvImportado');
        } else {
            redirect('inicioAdministrador/csvError');
        }
    }

    public function csvImportado() {
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'csvImportado';
        $this->load->view('includes/template', $data);
    }

    public function csvError() {
        $data['titulo'] = 'Sesion Administrador';
        $data['menu'] = 'administrador';
        $data['contenido'] = 'csvError';
        $this->load->view('includes/template', $data);
    }

    //Cuando se inicie sesion no se puede pasar a otra sesion, si se intenta se redirecciona al inicio
    function _isLogged() {
        if ($this->session->userdata('estado') != 1) {
            redirect('inicio');
        }
        if ($this->session->userdata('estado') == 1 && ($this->session->userdata('perfil') != 'administrador')) {
            redirect('inicio');
        }
    }

}

?>
