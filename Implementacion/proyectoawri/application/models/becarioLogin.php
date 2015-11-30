<?php

class BecarioLogin extends CI_Model {

    function validarUsuario($codigo) {
        $this->db->where('estudiantes_codigo', $codigo);
        $query = $this->db->get('becarios');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function validarContrasena($codigo, $contrasenaingresada) {
        $this->db->select('contrasena')->from('becarios')->where('estudiantes_codigo', $codigo);
        $query = $this->db->get();
        $row = $query->row();
        $contrasena = $row->contrasena;
        if ($contrasenaingresada == $contrasena) {
            return true;
        } else {
            return false;
        }
    }

    function devolverContrasena($codigo) {
        $this->db->select('contrasena')->from('becarios')->where('estudiantes_codigo', $codigo);
        $query = $this->db->get();
        $row = $query->row();
        return $row->contrasena;
    }

    function devolverCod_pcIP($ip) {
        $this->db->select('cod_comp')->from('computadores')->where('ip', $ip);
        $query = $this->db->get();
        $row = $query->row();
        return $row->cod_comp;
    }

    function nuevoRegistro($fecha, $hora_ingreso, $codigo, $cod_pc) {
        $registro = array(
            'becarios_Estudiantes_Codigo' => $codigo,
            'computadores_Cod_comp' => $cod_pc,
            'fecha_reg_bec' => $fecha,
            'hora_ing' => $hora_ingreso,
        );
        $this->db->insert('registrobecarios', $registro);
    }

    function datosBecario($codigo) {
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
