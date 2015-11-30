<?php

class EstudianteLogin extends CI_Model {

    function validarUsuario($codigo) {
        $this->db->where('codigo', $codigo);
        $query = $this->db->get('estudiantes');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function validarEstadoUsuario($codigo) {
        $this->db->select('estado')->where('codigo', $codigo);
        $query = $this->db->get('estudiantes');
        $row = $query->row();
        if ($row->estado == '0') {
            return false;
        } else {
            return true;
        }
    }

    function devolverPrograma($codigo) {
        $this->db->select('programa')->from('estudiantes')->where('Codigo', $codigo);
        $query = $this->db->get();
        $row = $query->row();
        return $row->programa;
    }

    function devolverCodigoPractica($practica) {
        $this->db->select('cod_practica')->from('tipo_practicas')->where('nombre_practica', $practica);
        $query = $this->db->get();
        $row = $query->row();
        return $row->cod_practica;
    }

    function devolverCod_pcIP($ip) {
        $this->db->select('cod_comp')->from('computadores')->where('ip', $ip);
        $query = $this->db->get();
        $row = $query->row();
        return $row->cod_comp;
    }

    function nuevoRegistro($fecha, $hora_ingreso, $codigo, $tipo_practica, $cod_pc) {
        $registro = array(
            'estudiante_Codigo' => $codigo,
            'tipo_practica_Cod_practica' => $tipo_practica,
            'computador_Cod_comp' => $cod_pc,
            'fecha_reg_est' => $fecha,
            'hora_ing' => $hora_ingreso
        );
        $this->db->insert('registroestudiantes', $registro);
    }

    function datosEstudiante($codigo) {
        $this->db->select()->from('estudiantes')->where('codigo', $codigo);
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado[0];
    }

    function isUsed($ip) {
        $this->db->select('user_data')->from('ci_sessions')->where('ip_address', $ip)->like('user_data', 'codigo');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}

?>
