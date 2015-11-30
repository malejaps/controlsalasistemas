<?php

class Becario extends CI_Model {

    //si no esta un estudiante en el sistema, se solicita su informacion para que el administrdor realice
    //posteriormente la activacion del estudiante
    function pedirCambioDeEstadoEstudiante($codigo, $programa, $nombre, $telefono, $direccion, $correo) {
        $data = array(
            'codigo' => $codigo,
            'programa' => $programa,
            'nombre_completo' => $nombre,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'correo' => $correo,
            'estado' => 0
        );
        $this->db->insert('estudiantes', $data);
    }

    //si no esta un funcionario en el sistema, se solicita su informacion para que el administrdor realice
    //posteriormente la activacion del funcionario
    function pedirCambioDeEstadoFuncionario($cedula, $nombre, $tel1, $tel2, $correo) {
        $data = array(
            'cedula' => $cedula,
            'nombre_fun' => $nombre,
            'telefono1' => $tel1,
            'telefono2' => $tel2,
            'correo_fun' => $correo,
            'contrasena' => $cedula,
            'estado' => 0
        );
        $this->db->insert('funcionarios', $data);
    }
    
   
   
    function finalizarFuncionario($horasalida, $observacion) {
        $this->db->select_max('idRegistofuncionario')->from('registrofuncionarios');
        $query = $this->db->get();
        $row = $query->row();
        $idRegistro = $row->idRegistofuncionario;
        $registros = array(
            'observaciones' => $observacion,
            'hora_sal' => $horasalida
        );
        $this->db->where('idRegistofuncionario', $idRegistro);
        $this->db->update('registrofuncionarios', $registros);
    }

    function finalizarBecario($observacion, $horasalida) {
        $this->db->select_max('idRegistobecario')->from('registrobecarios');
        $query = $this->db->get();
        $row = $query->row();
        $idRegistro = $row->idRegistobecario;
        $registro = array(
            'observaciones' => $observacion,
            'hora_sal' => $horasalida
        );
        $this->db->where('idRegistobecario', $idRegistro);
        $this->db->update('registrobecarios', $registro);
    }

    function datosEstudiante($codigo) {
        $this->db->select()->from('estudiantes')->where('codigo', $codigo);
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado[0];
    }

    function validarUsuario($codigo) {
        $this->db->where('codigo', $codigo);
        $query = $this->db->get('estudiantes');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function devolverPrograma($codigo) {
        $this->db->select('programa')->from('estudiantes')->where('codigo', $codigo);
        $query = $this->db->get();
        $row = $query->row();
        return $row->programa;
    }

    function devolverTelefonoEstudiante($codigo) {
        $this->db->select('Telefono')->from('estudiantes')->where('Codigo', $codigo);
        $query = $this->db->get();
        $row = $query->row();
        return $row->Telefono;
    }

    function devolverDireccionEstudiante($codigo) {

        $this->db->select('Direccion')->from('estudiantes')->where('Codigo', $codigo);
        $query = $this->db->get();
        $row = $query->row();
        return $row->Direccion;
    }

    function devolverCorreoEstudiante($codigo) {
        $this->db->select('Correo')->from('estudiantes')->where('Codigo', $codigo);
        $query = $this->db->get();
        $row = $query->row();
        return $row->Correo;
    }

    function devolverEstado($codigo) {
        $this->db->select('Estado')->from('estudiantes')->where('Codigo', $codigo);
        $query = $this->db->get();
        $row = $query->row();
        return $row->Estadoo;
    }

    //para administrador
    function cambioEstado($codigo) {
        $registro = array(
            'estado' => 1);

        $this->db->where('codigo_estudiante', $codigo);
        $this->db->update('estados_pendientes', $registro);
    }

    //actualizar info. basica del estudiante o el becario
    function actualizarEstudiante($codigo, $telefono, $direccion, $correo) {
        $registro = array(
            'Telefono' => $telefono,
            'Direccion' => $direccion,
            'Correo' => $correo
        );

        $this->db->where('codigo', $codigo);
        $this->db->update('estudiantes', $registro);
    }

    function obtenerIdRegistroFuncionario($cedula) {
        $this->db->select('idRegistrofuncionario')->from('registrofuncionario')->where('funcionario_Cedula', $cedula);
        $query = $this->db->get();
        $row = $query->row();
        return $row->idRegistrofuncionario;
    }
	
	 function buscarCedula($cedula) {
        $this->db->where('cedula', $cedula);
        $query = $this->db->get('funcionarios');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	    function buscarCodigo($codigo) {
        $this->db->where('Codigo', $codigo);
        $query = $this->db->get('estudiantes');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    
    
      function  devolverTotalRegistrosBecarios() {

        $query = $this->db->get('registrobecarios');
        return $query->num_rows();
    }

    
    
    
     function devolverRegistrosBecario($fechainicio, $fechafin) {
        $this->db->select('registrobecarios.fecha_reg_bec, registrobecarios.becarios_Estudiantes_Codigo, registrobecarios.computadores_Cod_comp, registrobecarios.hora_ing,registrobecarios.hora_sal,registrobecarios.observaciones');
        $this->db->from('registrobecarios');
        $this->db->where('registrobecarios.fecha_reg_bec BETWEEN "' . date('Y-m-d', strtotime($fechainicio)) . '" and "' . date('Y-m-d', strtotime($fechafin)) . '"');
        $this->db->join('estudiantes', 'estudiantes.Codigo = registrobecarios.becarios_Estudiantes_Codigo');
        
        $this->db->order_by('registrobecarios.becarios_Estudiantes_Codigo', 'asc');
        $this->db->order_by('registrobecarios.fecha_reg_bec', 'asc');
        $this->db->order_by('registrobecarios.computadores_Cod_comp', 'asc');
        $this->db->order_by('registrobecarios.hora_ing', 'asc');
        $this->db->order_by('registrobecarios.hora_sal', 'asc');
        $this->db->order_by('registrobecarios.observaciones', 'asc');
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
    }
    
    function devolverRegistrosEstudiantes($fechainicio, $fechafin) {
        $this->db->select('registroestudiantes.fecha_reg_est, registroestudiantes.estudiante_Codigo,registroestudiantes.computador_Cod_comp,registroestudiantes.hora_ing,registroestudiantes.hora_sal');
        $this->db->from('registroestudiantes');
        $this->db->where('registroestudiantes.fecha_reg_est BETWEEN "' . date('Y-m-d', strtotime($fechainicio)) . '" and "' . date('Y-m-d', strtotime($fechafin)) . '"');
        $this->db->join('estudiantes', 'estudiantes.Codigo = registroestudiantes.estudiante_Codigo');
        $this->db->order_by('registroestudiantes.estudiante_Codigo', 'asc');
        $this->db->order_by('registroestudiantes.fecha_reg_est', 'asc');
        $this->db->order_by('registroestudiantes.computador_Cod_comp', 'asc');
        $this->db->order_by('registroestudiantes.hora_ing', 'asc');
        $this->db->order_by('registroestudiantes.hora_sal', 'asc');
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
    }
    

}

?>
