<?php

class ModelAdmin extends CI_Model {

//acciones del adminsitr

    function insertarSancion($estudiantes_codigo, $descripcion, $fechaSancion) {
        $Sancion = array(
            'estudiantes_codigo' => $estudiantes_codigo,
            'descripcion' => $descripcion,
            'fecha_san' => $fechaSancion,
            'estado' => 1
        );

        $this->db->insert('sancion', $Sancion);
        redirect('sancionExitosa');
    }

    function validarContrasena($estudiantes_codigo, $contrasenaingresada) {
        $this->db->select('contrasena')->from('becarios')->where('estudiantes_codigo', $estudiantes_codigo);
        $query = $this->db->get();
        $row = $query->row();
        $contrasena = $row->contrasena;

        if ($contrasenaingresada == $contrasena) {
            return true;
        } else {
            return false;
        }
    }

    function actualizarContrasena($contrasena, $estudiantes_codigo) {

        $data = array(
            'contrasena' => $contrasena
        );

        $this->db->where('estudiantes_Codigo', $estudiantes_codigo);
        $this->db->update('becarios', $data);
       
        
    }

    function adicionarEquipos($salas_Cod_sala, $ip, $nombre_comp) {

        $datos = array(
            'salas_Cod_sala' => $salas_Cod_sala,
            'ip' => $ip,
            'nombre_comp' => $nombre_comp,
        );


        $this->db->insert('computadores', $datos);
    }

    function actualizarEquipos($codigo, $sala, $ip, $nombre) {
        $registro = array(
            'cod_comp' => $codigo,
            'salas_Cod_sala' => $sala,
            'ip' => $ip,
            'nombre_comp' => $nombre,
        );

        $this->db->where('cod_comp', $codigo);
        $this->db->update('computadores', $registro);
    }

    function actualizarSancion($con_san) {
        $estado = 2;
        $datos = array(
            'estado' => $estado
        );

        $this->db->where('con_san', $con_san);
        $this->db->update('sancion', $datos);
    }

    //actualizar info. basica del estudiante o el becario
    function actualizarBecario($codigo, $telefono, $direccion, $correo) {
        $registro = array(
            'Telefono' => $telefono,
            'Direccion' => $direccion,
            'Correo' => $correo
        );

        $this->db->where('codigo', $codigo);
        $this->db->update('estudiantes', $registro);
    }

    function adicionarBecarios($estudiantes_codigo, $cargo, $contrasena) {

        
        $datos = array(
            'estudiantes_Codigo' => $estudiantes_codigo,
            'cargo' => $cargo,
            'contrasena' => $contrasena
        );


        $this->db->insert('becarios', $datos);
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

    function validarPC($codigo) {
        $this->db->where('cod_comp', $codigo);
        $query = $this->db->get('computadores');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function validarSancion($sancion) {
        $this->db->where('con_san', $sancion);
        $query = $this->db->get('sancion');
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

    function devolverSalaComputador($codigo) {
        $this->db->select('salas_Cod_sala')->from('computadores')->where('cod_comp', $codigo);
        $query = $this->db->get();
        $row = $query->row();
        return $row->salas_Cod_sala;
    }

    function devolverIPComputador($codigo) {
        $this->db->select('ip')->from('computadores')->where('cod_comp', $codigo);
        $query = $this->db->get();
        $row = $query->row();
        return $row->ip;
    }

    function devolverNombreComputador($codigo) {
        $this->db->select('nombre_comp')->from('computadores')->where('cod_comp', $codigo);
        $query = $this->db->get();
        $row = $query->row();
        return $row->nombre_comp;
    }

    function devolverContrasena($codigo) {
        $this->db->select('contrasena')->from('becarios')->where('estudiantes_codigo', $codigo);
        $query = $this->db->get();
        $row = $query->row();
        return $row->contrasena;
    }
    
    
       function devolverTelefono1($codigo) {
        $this->db->select('telefono1')->from('funcionarios')->where('cedula', $codigo);
        $query = $this->db->get();
        $row = $query->row();
        return $row->telefono1;
    }
    
        function devolverTelefono2($codigo) {
        $this->db->select('telefono2')->from('funcionarios')->where('cedula', $codigo);
        $query = $this->db->get();
        $row = $query->row();
        return $row->telefono2;
    }
    
          function devolverCorreoFun($codigo) {
        $this->db->select('correo_fun')->from('funcionarios')->where('cedula', $codigo);
        $query = $this->db->get();
        $row = $query->row();
        return $row->correo_fun;
    }

    function insertarCaptcha($time, $ip, $word) {
        $valores = array(
            'time' => $time,
            'ip_address' => $ip,
            'word' => $word
        );
        $this->db->insert('captcha', $valores);
    }

    function borrarCaptcha($expiracion) {
        $this->db->where('time <', $expiracion);
        $this->db->delete('captcha');
    }

    function captchaExist($binds) {
        $sql = "SELECT COUNT(*) AS count FROM captcha" . " WHERE word = ? AND ip_address = ? AND time > ?";
        $query = $this->db->query($sql, $binds);
        $row = $query->row();

        if ($row->count == 0)
            return FALSE;
        else
            return TRUE;
    }

    function validarAdministrador($cedula, $contrasena) {
        $this->db->select('contrasena')->from('administradores')->where('cedula', $cedula);
        $this->db->where('contrasena', $contrasena);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function validarBecario($cedula, $contrasena) {
        $this->db->select('contrasena')->from('becarios')->where('estudiantes_Codigo', $cedula);
        $this->db->where('contrasena', $contrasena);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    
    function verficarFechaContrasena($cedula) {
        $this->db->select('ultima_actualizacion')->from('administradores')->where('cedula', $cedula);
        $query = $this->db->get();
        $row = $query->row();
        return $row->ultima_actualizacion;
    }

    function actContAdmin($cedula, $contrasena, $fecha) {
        $datos = array(
            'contrasena' => $contrasena,
            'ultima_actualizacion' => $fecha
        );
        $this->db->where('cedula', $cedula);
        $this->db->update('administradores', $datos);
    }

    function validarCedulaAdmin($cedula) {
        $this->db->select('cedula')->from('administradores')->where('cedula', $cedula);
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function emailAdmin($cedula) {
        $this->db->select('nombre, apellido, contrasena, email')->from('administradores')->where('cedula', $cedula);
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado[0];
    }

    function consultarRegistrosEstudiantes() {
        $this->db->select('registroestudiantes.estudiante_codigo, registroestudiantes.computador_Cod_comp, registroestudiantes.hora_ing,
            computadores.salas_Cod_sala, salas.nom_sala');
        $this->db->from('registroestudiantes');
        $this->db->join('computadores', 'computadores.cod_comp = registroestudiantes.computador_Cod_comp');
        $this->db->join('salas', 'salas.cod_sala = computadores.salas_Cod_sala');
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
    }

    function consultarRegistrosBecarios() {
        $this->db->select('registrobecarios.becarios_Estudiantes_Codigo, registrobecarios.computadores_Cod_comp, registrobecarios.hora_ing,
            computadores.salas_Cod_sala, salas.nom_sala');
        $this->db->from('registrobecarios');
        $this->db->join('computadores', 'computadores.cod_comp = registrobecarios.computadores_Cod_comp');
        $this->db->join('salas', 'salas.cod_sala = computadores.salas_Cod_sala');
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
    }

    function consultarRegistrosFuncionarios() {
        $this->db->select('registrofuncionarios.funcionario_Cedula, registrofuncionarios.computador_Cod_comp, registrofuncionarios.hora_ing,
            computadores.salas_Cod_sala, salas.nom_sala');
        $this->db->from('registrofuncionarios');
        $this->db->join('computadores', 'computadores.cod_comp = registrofuncionarios.computador_Cod_comp');
        $this->db->join('salas', 'salas.cod_sala = computadores.salas_Cod_sala');
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
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

    //buscar codigo becario
    function buscarCodigo($codigo) {
        $this->db->where('estudiantes_Codigo', $codigo);
        $query = $this->db->get('becarios');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	
	//Activar y actualizar funcionario
	function guardar($cedula,$estado){
        $data = array(
             'estado' => $estado          
        );
        $this->db->where('cedula', $cedula);
        $this->db->update('funcionarios', $data);
        
        }
        
    
    
     function ActualizarFuncionario($cedula, $telefono1, $telefono2, $correo_fun) {
         
            $registro = array(
            'telefono1' => $telefono1,
            'telefono2' => $telefono2,
            'correo_fun' => $correo_fun,
           
        );

       $this->db->where('cedula', $cedula);
        $this->db->update('funcionarios', $registro);}
        
         function buscarCedula($cedula) {
        $this->db->where('cedula', $cedula);
        $query = $this->db->get('funcionarios');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	
	

    //Total nuemro de sanciones para numero de filas paginacion tabla sanciones
    function devolverTotalSanciones() {

        $query = $this->db->get('sancion');
        return $query->num_rows();
    }

    /* Consultas reportes */

    //Devolver registros de sanciones para pdf de paz y salvo
    function devolverSanciones($per_page, $segment) {

        $this->db->select('con_san,estudiantes_Codigo,descripcion,fecha_san,estadosancion.descipcion');
        $this->db->from('sancion');
        $this->db->join('estadosancion', 'estadosancion.cod_estado=sancion.estado');
        $this->db->limit($per_page, $segment);
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
    }

    function devolverSancionesPDF($codigo) {

        $this->db->select('con_san,estudiantes_Codigo,descripcion,fecha_san,estadosancion.descipcion');
        $this->db->from('sancion');
        $this->db->where('con_san', $codigo);
        $this->db->join('estadosancion', 'estadosancion.cod_estado=sancion.estado');
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
    }

    //Devolver registros de becarios para pdf/excel
    function devolverRegistrosBecarios($fechainicio, $fechafin) {
        $this->db->select('registrobecarios.fecha_reg_bec, estudiantes.Nombre_Completo, salas.nom_sala, registrobecarios.hora_ing, registrobecarios.hora_sal, registrobecarios.observaciones');
        $this->db->from('registrobecarios');
        $this->db->where('registrobecarios.fecha_reg_bec BETWEEN "' . date('Y-m-d', strtotime($fechainicio)) . '" and "' . date('Y-m-d', strtotime($fechafin)) . '"');
        $this->db->join('computadores', 'computadores.cod_comp = registrobecarios.computadores_Cod_comp');
        $this->db->join('salas', 'salas.cod_sala = computadores.salas_Cod_sala');
        $this->db->join('estudiantes', 'estudiantes.Codigo = registrobecarios.becarios_Estudiantes_Codigo');
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
    }

    //Devolver registros de un solo becario para pdf/excel
    function devolverRegistrosUnBecario($fechainicio, $fechafin, $codigo) {
        $this->db->select('registrobecarios.fecha_reg_bec, estudiantes.Nombre_Completo, salas.nom_sala, registrobecarios.hora_ing, registrobecarios.hora_sal, registrobecarios.observaciones');
        $this->db->from('registrobecarios');
        $this->db->where('registrobecarios.fecha_reg_bec BETWEEN "' . date('Y-m-d', strtotime($fechainicio)) . '" and "' . date('Y-m-d', strtotime($fechafin)) . '"');
        $this->db->where('registrobecarios.becarios_Estudiantes_Codigo', $codigo);
        $this->db->join('computadores', 'computadores.cod_comp = registrobecarios.computadores_Cod_comp');
        $this->db->join('salas', 'salas.cod_sala = computadores.salas_Cod_sala');
        $this->db->join('estudiantes', 'estudiantes.Codigo = registrobecarios.becarios_Estudiantes_Codigo');
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
    }

    //Devolver registros de usuarios para pdf/excel
    function devolverRegistrosUsuarios($fechainicio, $fechafin) {
        $this->db->select('registroestudiantes.fecha_reg_est, registroestudiantes.estudiante_Codigo, estudiantes.Nombre_Completo, estudiantes.Programa, programas.nombre_prog');
        $this->db->from('registroestudiantes');
        $this->db->where('registroestudiantes.fecha_reg_est BETWEEN "' . date('Y-m-d', strtotime($fechainicio)) . '" and "' . date('Y-m-d', strtotime($fechafin)) . '"');
        $this->db->join('estudiantes', 'estudiantes.Codigo = registroestudiantes.estudiante_Codigo');
        $this->db->join('programas', 'programas.Programa = estudiantes.Programa');
        $this->db->order_by('estudiantes.Programa', 'asc');
        $this->db->order_by('registroestudiantes.estudiante_Codigo', 'asc');
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
    }

    //Devolver registros de funcionarios para pdf/excel
    function devolverRegistrosFuncionarios($fechainicio, $fechafin) {
        $this->db->select('registrofuncionarios.fecha_reg_fun, registrofuncionarios.funcionario_Cedula, funcionarios.nombre_fun');
        $this->db->from('registrofuncionarios');
        $this->db->where('registrofuncionarios.fecha_reg_fun BETWEEN "' . date('Y-m-d', strtotime($fechainicio)) . '" and "' . date('Y-m-d', strtotime($fechafin)) . '"');
        $this->db->join('funcionarios', 'funcionarios.cedula = registrofuncionarios.funcionario_Cedula');
        $this->db->order_by('registrofuncionarios.fecha_reg_fun', 'asc');
        $this->db->order_by('registrofuncionarios.funcionario_Cedula', 'asc');
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
    }

    //Devolver registros de un solo funcionario para pdf/excel
    function devolverRegistrosUnFuncionario($fechainicio, $fechafin, $codigo) {
        $this->db->select('registrofuncionarios.fecha_reg_fun, registrofuncionarios.funcionario_Cedula, funcionarios.nombre_fun');
        $this->db->from('registrofuncionarios');
        $this->db->where('registrofuncionarios.fecha_reg_fun BETWEEN "' . date('Y-m-d', strtotime($fechainicio)) . '" and "' . date('Y-m-d', strtotime($fechafin)) . '"');
        $this->db->where('registrofuncionarios.funcionario_Cedula', $codigo);
        $this->db->join('funcionarios', 'funcionarios.cedula = registrofuncionarios.funcionario_Cedula');
        $this->db->order_by('registrofuncionarios.fecha_reg_fun', 'asc');
        $this->db->order_by('registrofuncionarios.funcionario_Cedula', 'asc');
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
    }

    //Devolver sanciones de estudiantes para pdf/excel
    function devolverSancionesEst($fechainicio, $fechafin) {
        $this->db->select('sancion.fecha_san, sancion.estudiantes_Codigo, estudiantes.Nombre_Completo');
        $this->db->from('sancion');
        $this->db->where('sancion.fecha_san BETWEEN "' . date('Y-m-d', strtotime($fechainicio)) . '" and "' . date('Y-m-d', strtotime($fechafin)) . '"');
        $this->db->join('estudiantes', 'estudiantes.Codigo = sancion.estudiantes_Codigo');
        $this->db->order_by('sancion.fecha_san', 'asc');
        $this->db->order_by('sancion.estudiantes_Codigo', 'asc');
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
    }

    /* FIN Consultas reportes */


    /* Combo box */

    function devolverCodigosEstudiantes() {
        $this->db->select('Codigo');
        $this->db->from('estudiantes');
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
    }
    
    
    
    function devolverBecarios(){
        
        $this->db->select('estudiantes_Codigo')->from('becarios');
        $becarios=$this->db->get();
        return $becarios;
    }
    
    function devolverCodigosEstudiantesNoBecarios() {
        
       $sql="SELECT Codigo FROM estudiantes WHERE NOT EXISTS(SELECT estudiantes_Codigo FROM becarios WHERE estudiantes.Codigo=becarios.estudiantes_Codigo)";
        $sql=  $this->db->query($sql);
        if($sql->num_rows()>0){            
            foreach ($sql->result() as $fila):
                $data[]= $fila;
                endforeach;
            
        }
        
        return $data;
       
    }

    function devolverCodigosSanciones() {
        $this->db->select('con_san');
        $this->db->from('sancion');
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
    }

    function devolverCodigosBecarios() {
        $this->db->select('estudiantes_Codigo');
        $this->db->from('becarios');
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
    }

    function devolverCodigosFuncionarios() {
        $this->db->select('cedula');
        $this->db->from('funcionarios');
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
    }
    
    
    function devolverCodigosFuncionariosEstadoNo() {
        $this->db->select('cedula');
        $this->db->from('funcionarios');
        $this->db->where('estado','0');
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
    }

    function devolverCodigosSalas() {
        $this->db->select('cod_sala');
        $this->db->from('salas');
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
    }

    /* Fin combo box */
    
    /*Importar archivo csv*/
    
     function validarDocente($cedula) {
        $this->db->select('cedula')->where('cedula', $cedula);
        $query = $this->db->get('funcionarios');
        //$row = $query->row();
        if ($query->num_rows() <= 0) {
            return false;
        } else {
            return true;
        }
    }
   
    /*Fin archivos csv*/
    
    /*Liberar computador  */
    


    
    function listarSalas() {
        $this->db->select('nom_sala')->from('salas');
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
    }


    function consultarSesion($codigo) {
        $this->db->select('session_id')->from('ci_sessions')->like('user_data', $codigo);
        $query = $this->db->get();
        $row = $query->row();
        return $row->session_id;
    }

    function cerrarSesionUsuario($id) {
        $valores = array(
            'session_id' => $id.'1' //Cualquier numero
        );
        $this->db->where('session_id', $id);
        $this->db->update('ci_sessions', $valores);
    }

    function consutlarPcsUsados() {
        $this->db->select('registroestudiantes.idRegistoestudiante, registroestudiantes.estudiante_Codigo, computadores.nombre_comp')->from('registroestudiantes');
        $this->db->join('computadores', 'computadores.cod_comp = registroestudiantes.computador_Cod_comp');
        $this->db->where('hora_sal', NULL);
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
    }

    function actualizarHoraSalida($id, $fecha) {
        $valores = array(
            'hora_sal' => $fecha
        );
        $this->db->where('idRegistoestudiante', $id);
        $this->db->update('registroestudiantes', $valores);
    }
    
    /*Liberar computador */
    
     function insertarEstudiante($codigo, $programa, $nombre, $telefono, $direccion, $correo) {
        $data = array(
            'codigo' => $codigo,
            'programa' => $programa,
            'nombre_completo' => $nombre,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'correo' => $correo,
            'estado' => 1
        );
        $this->db->insert('estudiantes', $data);
    }
    
    
    function insertarDocente($cedula, $nombre, $telefono1,$telefono2, $correo) {       
        
        $data = array(
            'cedula' => $cedula,
            'nombre_fun' => $nombre,
            'telefono1' => $telefono1,
            'telefono2' => $telefono2,            
            'correo_fun' => $correo,
            'contrasena' => $cedula,
            'estado' => 1
        );
        $this->db->insert('funcionarios', $data);
    }
    
    function cambiarEstadoEstudiantes(){
       $sql = "UPDATE `estudiantes` SET `Estado`=0 WHERE `Estado`=1";
       $this->db->query($sql);
    } 
    
    function validarEstudiante($codigo) {
        $this->db->select('Codigo')->where('Codigo', $codigo);
        $query = $this->db->get('estudiantes');
        //$row = $query->row();
        if ($query->num_rows() <= 0) {
            return false;
        } else {
            return true;
        }
    }
    
     function validarFuncionario($codigo) {
        $this->db->select('cedula')->where('cedula', $codigo);
        $query = $this->db->get('funcionarios');
        //$row = $query->row();
        if ($query->num_rows() <= 0) {
            return false;
        } else {
            return true;
        }
    }
    
      function ListarProgramas() {
        $this->db->select('Programa');
        $this->db->from('Programas');
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
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

    
}

?>
