<?php
class FuncionarioLogin extends CI_Model {

    function validarFuncionario($cedula, $contrasena) {
        $this->db->where('cedula', $cedula);
        $this->db->where('contrasena', $contrasena);
        $query = $this->db->get('funcionarios');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    function validarUsuario($cedula) {
        $this->db->where('cedula', $cedula);
        $query = $this->db->get('funcionarios');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    function validarAsignatura($asg) {
        $this->db->where('codigo_asg', $asg);
        $query = $this->db->get('asignaturas');
        //$row = $query->row();
        if ($query->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }
    
    function validarPrograma($prg) {
        $this->db->where('programa', $prg);
        $query = $this->db->get('programas');
        //$row = $query->row();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    function listaAsignaturas(){
       $this->db->select('codigo_asg')->from('asignaturas');
       $query = $this->db->get();
       return mysql_query($query);
    }
    
    function devolverAsignatura($codigo) {
        $this->db->select('codigo_asg')->from('asignaturas')->where('codigo_asg', $codigo);
        $query = $this->db->get();
        $row = $query->row();
        return $row->programa;
    }
    
    function devolverPrograma($codigo) {
        $this->db->select('programa')->from('estudiantes')->where('codigo', $codigo);
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
    
    function devolverCod_pcIP($ip){
        $this->db->select('cod_comp')->from('computadores')->where('ip', $ip);
        $query = $this->db->get();
        $row = $query->row();
        return $row->cod_comp;
    }
    
    function nuevoRegistro($fecha, $hora_ingreso, $cedula, $tipo_practica, $cod_pc ,$cod_asg,$cod_prog){
        $registro = array(
            'funcionario_Cedula'             => $cedula,
            'computador_Cod_comp'           => $cod_pc,
            'asignatura_Codigo_asg'       =>  $cod_asg,
            'tipo_practica_Cod_practica'    => $tipo_practica,
            'programas_Codigo_prog'        => $cod_prog,
            'fecha_reg_fun'                 => $fecha,
            'hora_ing'                      => $hora_ingreso            
        );
        $this->db->insert('registrofuncionarios', $registro);
    }
    
    function datosFuncionarios($cedula){
        $this->db->select()->from('Funcionarios')->where('cedula', $cedula);
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado[0];
    
    }
    
    function isUsed($ip){
        $this->db->select('user_data')->from('ci_sessions')->where('ip_address', $ip)->like('user_data', 'codigo');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }        
    }
    
     function cambioContrasena($contrasena,$contrasenavieja){
        $sql = "UPDATE `funcionarios` SET `contrasena`= '" .$contrasena. "' WHERE `contrasena`='".$contrasenavieja."'";
        $this->db->query($sql);
    }
    
    function devovlerCotrasena($cedula){
        $this->db->select('contrasena')->from('funcionarios')->where('cedula', $cedula);
        $query = $this->db->get();
        $row = $query->row();
        return $row->contrasena;
    }

}
?>
