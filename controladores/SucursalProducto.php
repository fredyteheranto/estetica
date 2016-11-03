<?php

include_once 'lib/db.php';
include_once 'config.php';
include_once 'modelos/sucursal_producto.php';

class contoladorSucursalProducto {

    function registrarSucursalProducto($id = null, $idSucursal, $idProducto) {
        $modelSucursalProducto = new modeloSucursalProducto();
        if ($id != null) {
            $modelSucursalProducto->Load('id=?', array($id));
            $modelSucursalProducto->id = $id;
        }
        $modelSucursalProducto->sucursal_idsucursal = $idSucursal;
        $modelSucursalProducto->producto_idproducto = $idProducto;

        if ($modelSucursalProducto->Save()) {
            echo json_encode(array('estado' => 'Datos procesados...! '));
        } else {
            header('HTTP/1.1 304');
        }
    }

    function eliminarSucursalProducto($id) {
        $modeloSucursalProducto = new modeloSucursalProducto();
        $modeloSucursalProducto->Load('id=?', array($id));
        if ($modeloSucursalProducto->Delete()) {
            echo json_encode(array('estado' => 'Solicitud procesada con exito...'));
        } else {
            header('HTTP/1.1 204');
        }
    }

    function seleccionarSucursalProducto($id) {
        $modeloSucursalProducto = new modeloSucursalProducto();
        $resultado = $modeloSucursalProducto->Find('id=?', array($id));
        if (count($resultado) > 0) {
            foreach ($resultado as $sucursalProducto) {
                echo json_encode(array('id' => $sucursalProducto->id, 'idsucursal' => $sucursalProducto->sucursal_idsucursal, 'idproducto' => $sucursalProducto->producto_idproducto));
            }
        } else {
            header('HTTP/1.1 204');
        }
    }

    function listarSucursalProductos() {
        global $DB;
        $resultado = $DB->Execute('SELECT 
                                          sp.id as id,
                                          p.nombre as nombreProducto,
                                          s.nombre as nombreSucursal
                                   FROM 
                                   producto p 
                                   inner join sucursal_producto sp on p.idproducto=sp.producto_idproducto
                                   inner join sucursal s on s.idsucursal=sp.sucursal_idsucursal');
        if ($resultado) {
            while (!$resultado->EOF) {
                $sucrsalProducto[] = array('id' => $resultado->fields['id'], 'nombreProducto' => $resultado->fields['nombreProducto'], 'nombreSucursal' => $resultado->fields['nombreSucursal']);
                $resultado->MoveNext();
            }
            echo json_encode($sucrsalProducto);
        } else {
            header('HTTP/1.1 204');
        }
    }

    function seleccionarSucursalProductos($idSucursal) {
        global $DB;
        $resultado = $DB->Execute('SELECT 
                                          sp.id as id,
                                          p.idproducto,
                                          p.nombre as nombreProducto
                                   FROM 
                                   producto p 
                                   inner join sucursal_producto sp on p.idproducto=sp.producto_idproducto
                                   inner join sucursal s on s.idsucursal=sp.sucursal_idsucursal where s.idsucursal=' . $idSucursal);
        if ($resultado) {
            while (!$resultado->EOF) {
                $sucrsalProducto[] = array('id' => $resultado->fields['id'], 'idproducto' => $resultado->fields['idproducto'], 'nombreProducto' => $resultado->fields['nombreProducto']);
                $resultado->MoveNext();
            }
            echo json_encode($sucrsalProducto);
        } else {
            header('HTTP/1.1 204');
        }
    }

}
