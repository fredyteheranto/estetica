<?php

include_once 'lib/db.php';
include_once 'config.php';
include_once 'modelos/horario.php';

class contoladorHorario {

    function listarHorarios($idPersona, $fecha) {
        global $DB;
        $resultado = $DB->Execute("SELECT 
                                            *
                                        FROM
                                            horario h
                                        WHERE
                                            h.idhorario NOT IN (SELECT 
                                                    horario_idhorario
                                                FROM
                                                    reserva r
                                                WHERE
                                                    r.fecha = '" . $fecha . "'
                                                        AND r.persona_idpersona = " . $idPersona . ")");
       
        if ($resultado) {
            while (!$resultado->EOF) {
                $horarios[] = array('id' => $resultado->fields['idhorario'], 'hora_inicio' => $resultado->fields['hora_inicio'], 'hora_fin' => $resultado->fields['hora_fin']);
                $resultado->MoveNext();
            }
            echo json_encode($horarios);
        } else {
            header('HTTP/1.1 204');
        }
    }

}
