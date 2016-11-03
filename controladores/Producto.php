<?php

include_once 'lib/db.php';
include_once 'config.php';
include_once 'modelos/producto.php';

class contoladorProducto {

    function registrarProducto($id = null, $nombre, $costo, $detalle) {
        $modelProducto = new modeloProducto();
        if ($id != null) {
            $modelProducto->Load('idproducto=?', array($id));
            $modelProducto->id = $id;
        }
        $modelProducto->nombre = $nombre;
        $modelProducto->costo = $costo;
        $modelProducto->detalle = $detalle;
        if ($modelProducto->Save()) {
            echo json_encode(array('estado' => 'Datos procesados...! '));
        } else {
            header('HTTP/1.1 304');
        }
    }

    function eliminarProducto($id) {
        $modeloProducto = new modeloProducto();
        $modeloProducto->Load('idproducto=?', array($id));
        if ($modeloProducto->Delete()) {
            echo json_encode(array('estado' => 'Producto eliminado...'));
        } else {
            header('HTTP/1.1 204');
        }
    }

    function seleccionarProducto($id) {
        $modeloProducto = new modeloProducto();
        $resultado = $modeloProducto->Find('idproducto=?', array($id));
        if (count($resultado) > 0) {
            foreach ($resultado as $producto) {
                echo json_encode(array('id' => $producto->idproducto, 'nombre' => $producto->nombre, 'costo' => $producto->costo, 'detalle' => $producto->detalle));
            }
        } else {
            header('HTTP/1.1 204');
        }
    }

    function listarProductos() {
        $modeloProducto = new modeloProducto();
        $resultado = $modeloProducto->Find('');
        if (count($resultado) > 0) {
            foreach ($resultado as $producto) {
                $productos[] = array('id' => $producto->idproducto, 'nombre' => $producto->nombre, 'costo' => $producto->costo, 'detalle' => $producto->detalle);
            }
            echo json_encode($productos);
        } else {
            header('HTTP/1.1 204');
        }
    }

}
