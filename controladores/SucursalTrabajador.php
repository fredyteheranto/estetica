<?php

include_once 'lib/db.php';
include_once 'config.php';
include_once 'modelos/sucursal_trabajador.php';

class contoladorSucursalTrabajador {

    function registrarSucursalTrabajador($id = null, $idProducto, $idTrabajador) {
        //echo json_encode(array($idTrabajador,$idProducto));die;
        $modelSucursalTrabajador = new modeloSucursalTrabajador();
        if ($id != null) {
            $modelSucursalTrabajador->Load('id=?', array($id));
            $modelSucursalTrabajador->id = $id;
        }
        $modelSucursalTrabajador->sucursal_producto_id = $idProducto;
        $modelSucursalTrabajador->persona_idpersona = $idTrabajador;

        if ($modelSucursalTrabajador->Save()) {
            echo json_encode(array('estado' => 'Datos procesados...!'));
        } else {
            header('HTTP/1.1 304');
        }
    }

    function eliminarSucursalTrabajador($id) {
        $modeloSucursalTrabajador = new modeloSucursalTrabajador();
        $modeloSucursalTrabajador->Load('id=?', array($id));
        if ($modeloSucursalTrabajador->Delete()) {
            echo json_encode(array('estado' => 'Solicitud procesada con exito...'));
        } else {
            header('HTTP/1.1 204');
        }
    }

    function seleccionarSucursalTrabajador($id) {
        $modeloSucursalTrabajador = new modeloSucursalTrabajador();
        $resultado = $modeloSucursalTrabajador->Find('id=?', array($id));
        if (count($resultado) > 0) {
            foreach ($resultado as $sucursalTrabajador) {
                echo json_encode(array('id' => $sucursalTrabajador->id, 'idsucursal' => $sucursalTrabajador->sucursal_idsucursal, 'idtrabajador' => $sucursalTrabajador->trabajador_idtrabajador));
            }
        } else {
            header('HTTP/1.1 204');
        }
    }

    function listarSucursalTrabajadores() {
        global $DB;
        $resultado = $DB->Execute('SELECT 
                                        st.id,
                                        s.nombre as sucursal,
                                        po.nombre as producto, 
                                        pa.nombre as trabajador
                                    from sucursal s 
                                    inner join sucursal_producto sp on sp.sucursal_idsucursal=s.idsucursal
                                    inner join producto po on po.idproducto=sp.producto_idproducto
                                    inner join sucursal_trabajador st on st.sucursal_producto_id=sp.id
                                    inner join persona pa on pa.idpersona=st.persona_idpersona');
        if ($resultado) {
            while (!$resultado->EOF) {
                $sucrsalTrabajador[] = array('id' => $resultado->fields['id'], 'sucursal' => $resultado->fields['sucursal'], 'producto' => $resultado->fields['producto'], 'trabajador' => $resultado->fields['trabajador']);
                $resultado->MoveNext();
            }
            echo json_encode($sucrsalTrabajador);
        } else {
            header('HTTP/1.1 204');
        }
    }

}
