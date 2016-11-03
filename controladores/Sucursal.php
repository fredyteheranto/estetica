<?php

include_once 'lib/db.php';
include_once 'config.php';
include_once 'modelos/sucursal.php';
$conn = new db($localdb->host, $localdb->db, $localdb->user, $localdb->pass);
$conn_reporte = $conn->Conectar();

class contoladorSucursal {

    function registrarSucursal($id = null, $nombre, $direccion, $telefono) {
        $modelSucursal = new modeloSucursal();
        if ($id != null) {
            $modelSucursal->Load('idsucursal=?', array($id));
            $modelSucursal->id = $id;
        }
        $modelSucursal->nombre = $nombre;
        $modelSucursal->direccion = $direccion;
        $modelSucursal->telefono = $telefono;

        if ($modelSucursal->Save()) {
            echo json_encode(array('estado' => 'Datos procesados...!'));
        } else {
            header('HTTP/1.1 304');
        }
    }

    function eliminarSucursal($id) {
        $modeloSucursal = new modeloSucursal();
        $modeloSucursal->Load('idsucursal=?', array($id));
        if ($modeloSucursal->Delete()) {
            echo json_encode(array('estado' => 'Sucursal eliminada...'));
        } else {
            header('HTTP/1.1 204');
        }
    }

    function seleccionarSucursal($id) {
        $modeloSucursal = new modeloSucursal();
        $resultado = $modeloSucursal->Find('idsucursal=?', array($id));
        if (count($resultado) > 0) {
            foreach ($resultado as $sucursal) {
                echo json_encode(array('id' => $sucursal->idsucursal, 'nombre' => $sucursal->nombre, 'direccion' => $sucursal->direccion, 'telefono' => $sucursal->telefono));
            }
        } else {
            header('HTTP/1.1 204');
        }
    }

    function listarSucursales() {
        $modeloSucursal = new modeloSucursal();
        $resultado = $modeloSucursal->Find('');
        if (count($resultado) > 0) {
            foreach ($resultado as $sucursal) {
                $sucursales[] = array('id' => $sucursal->idsucursal, 'nombre' => $sucursal->nombre, 'direccion' => $sucursal->direccion, 'telefono' => $sucursal->telefono);
            }
            echo json_encode($sucursales);
        } else {
            header('HTTP/1.1 204');
        }
    }

}
