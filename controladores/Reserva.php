<?php

include_once 'lib/db.php';
include_once 'config.php';
include_once 'modelos/reserva.php';

class contoladorReserva {

    function registrarReserva($idProducto, $idCliente, $idTrabajador, $fecha, $idHorario) {

        $modelReserva = new modeloReserva();
        $modelReserva->sucursal_producto_id = $idProducto;
        $modelReserva->persona_idpersona = $idTrabajador;
        $modelReserva->horario_idhorario = $idHorario;
        $modelReserva->cliente = $idCliente;
        $modelReserva->fecha = $fecha;
//        echo json_encode($modelReserva);die;
        if ($modelReserva->Save()) {
            echo json_encode(array('estado' => 'Datos procesados...!'));
        } else {
            header('HTTP/1.1 304');
        }
    }

    function eliminarReserva($id) {
        $modeloReserva = new modeloReserva();
        $modeloReserva->Load('idreserva=?', array($id));
        if ($modeloReserva->Delete()) {
            echo json_encode(array('estado' => 'Solicitud procesada con exito...'));
        } else {
            header('HTTP/1.1 204');
        }
    }

    function listarReservas() {
        global $DB;
        $resultado = $DB->Execute('SELECT 
                                        r.idreserva,
                                        s.nombre AS sucursal,
                                        p.nombre AS trabajador,
                                        p2.nombre AS cliente,
                                        po.nombre AS producto,
                                        r.fecha
                                    FROM
                                        sucursal s
                                            INNER JOIN
                                        sucursal_producto sp ON s.idsucursal = sp.sucursal_idsucursal
                                            INNER JOIN
                                        reserva r ON r.sucursal_producto_id = sp.id
                                            INNER JOIN
                                        horario h ON r.horario_idhorario = h.idhorario
                                            INNER JOIN
                                        persona p ON p.idpersona = r.persona_idpersona
                                            INNER JOIN
                                        persona p2 ON p2.idpersona = r.cliente
                                            INNER JOIN
                                        producto po ON po.idproducto = sp.producto_idproducto');
        if ($resultado) {
            while (!$resultado->EOF) {
                $sucursalTrabajador[] = array('id' => $resultado->fields['idreserva'], 'sucursal' => $resultado->fields['sucursal'], 'trabajador' => $resultado->fields['trabajador'], 'cliente' => $resultado->fields['cliente'], 'producto' => $resultado->fields['producto'], 'fecha' => $resultado->fields['fecha']);
                $resultado->MoveNext();
            }
            echo json_encode($sucursalTrabajador);
        } else {
            header('HTTP/1.1 204');
        }
    }

}
