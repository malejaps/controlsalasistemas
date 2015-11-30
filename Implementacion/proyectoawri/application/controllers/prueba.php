<?php

class Prueba extends CI_Controller {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Bogota');
        $this->load->model('modelAdmin');
    }

    function buscar($arreglo, $elemento) {
        for ($i = 0; $i < sizeof($arreglo); $i++) {
            if ($arreglo[$i] == $elemento) {
                return true;
            }
        }
        return false;
    }

    function index() {
        $registros = $this->modelAdmin->consultarRegistros();
        $salasManana = $this->modelAdmin->listarSalas();
        $salasTarde = $this->modelAdmin->listarSalas();
        $salasNoche = $this->modelAdmin->listarSalas();
        $manana = strtotime('06:00:00');
        $tarde = strtotime('12:00:00');
        $noche = strtotime('18:00:00');

        for ($i = 0; $i < sizeof($registros); $i++) {
            $registro = $registros[$i];
            if (strtotime($registro['hora_ing']) >= $manana && strtotime($registro['hora_ing']) < $tarde) {
                for ($j = 0; $j < sizeof($salasManana); $j++) {
                    if ($salasManana[$j]['nom_sala'] == $registro['nom_sala']) {
                        if (!isset($salasManana[$j]['usuarios'])) {
                            $salasManana[$j]['usuarios'][] = $registro['estudiante_codigo'];
                        } else {
                            if (!$this->buscar($salasManana[$j]['usuarios'], $registro['estudiante_codigo'])) {
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
                                if (!$this->buscar($salasTarde[$j]['usuarios'], $registro['estudiante_codigo'])) {
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
                                    if (!$this->buscar($salasNoche[$j]['usuarios'], $registro['estudiante_codigo'])) {
                                        $salasNoche[$j]['usuarios'][] = $registro['estudiante_codigo'];
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

}

?>
