<?php

include_once 'lib/db.php';
include_once 'config.php';
include_once 'modelos/persona.php';

class contoladorPersona {

    function registrarPersona($id = null, $nombre, $apellido, $email, $telefono) {
        $modelPersona = new modeloPersona();
        if ($id != null) {
            $modelPersona->Load('idpersona=?', array($id));
            $modelPersona->id = $id;
        }
        $modelPersona->nombre = $nombre;
        $modelPersona->apellido = $apellido;
        $modelPersona->email = $email;
        $modelPersona->telefono = $telefono;

        if ($modelPersona->Save()) {
            echo json_encode(array('estado' => 'Datos procesados...! '));
        } else {
            header('HTTP/1.1 304');
        }
    }

    function eliminarPersona($id) {
        $modeloPersona = new modeloPersona();
        $modeloPersona->Load('idpersona=?', array($id));
        if ($modeloPersona->Delete()) {
            echo json_encode(array('estado' => 'Persona eliminado...'));
        } else {
            header('HTTP/1.1 204');
        }
    }

    function seleccionarPersona($id) {
        $modeloPersona = new modeloPersona();
        $resultado = $modeloPersona->Find('idpersona=?', array($id));
        if (count($resultado) > 0) {
            foreach ($resultado as $persona) {
                echo json_encode(array('id' => $persona->idpersona, 'nombre' => $persona->nombre, 'apellido' => $persona->apellido, 'email' => $persona->email, 'telefono' => $persona->telefono));
            }
        } else {
            header('HTTP/1.1 204');
        }
    }

    function listarPersonas() {
        $modeloPersona = new modeloPersona();
        $resultado = $modeloPersona->Find('');
        if (count($resultado) > 0) {
            foreach ($resultado as $persona) {
                $personas[] = array('id' => $persona->idpersona, 'nombre' => $persona->nombre, 'apellido' => $persona->apellido, 'email' => $persona->email, 'telefono' => $persona->telefono);
            }
            echo json_encode($personas);
        } else {
            header('HTTP/1.1 204');
        }
    }

    function listarTrabajadores($idProducto) {

        global $DB;
        $resultado = $DB->Execute('SELECT DISTINCT
                                                p.*
                                            FROM
                                                persona p
                                                    INNER JOIN
                                                sucursal_trabajador st ON st.persona_idpersona = p.idpersona
                                                    INNER JOIN
                                                sucursal_producto sp ON sp.id = st.sucursal_producto_id
                                            WHERE
                                                sp.producto_idproducto=' . $idProducto);
        if ($resultado) {
            while (!$resultado->EOF) {
                $trabajadores[] = array('id' => $resultado->fields['idpersona'], 'nombre' => $resultado->fields['nombre'], 'apellido' => $resultado->fields['apellido'], 'email' => $resultado->fields['email'], 'telefono' => $resultado->fields['telefono']);
                $resultado->MoveNext();
            }
            echo json_encode($trabajadores);
        } else {
            header('HTTP/1.1 204');
        }
    }

}
