<?php

require_once 'controladores/Producto.php';
require_once 'controladores/Sucursal.php';
require_once 'controladores/Persona.php';
require_once 'controladores/SucursalProducto.php';
require_once 'controladores/SucursalTrabajador.php';
require_once 'controladores/Horario.php';
require_once 'controladores/Reserva.php';


header('Content-Type: application/json');

if (isset($_POST['funcion'])) {
    switch ($_POST['funcion']) {

        /* INICIO Servicios del producto */
        case 'registrarProducto':
            $controladorProducto = new contoladorProducto();
            $controladorProducto->registrarProducto($_POST['id'], $_POST['nombre'], $_POST['costo'], $_POST['detalle']);
            unset($controladorProducto);
            break;
        case 'listarProductos':
            $controladorProducto = new contoladorProducto();
            $controladorProducto->listarProductos();
            unset($controladorProducto);
            break;
        case 'eliminarProducto':
            $controladorProducto = new contoladorProducto();
            $controladorProducto->eliminarProducto($_POST['id']);
            unset($controladorProducto);
            break;
        case 'seleccionarProducto':
            $controladorProducto = new contoladorProducto();
            $controladorProducto->seleccionarProducto($_POST['id']);
            unset($controladorProducto);
            break;
        /* FIN Servicios del producto */

        /* INICIO Servicios de la sucursal */
        case 'registrarSucursal':
            $controladorSucursal = new contoladorSucursal();
            $controladorSucursal->registrarSucursal($_POST['id'], $_POST['nombre'], $_POST['direccion'], $_POST['telefono']);
            unset($controladorSucursal);
            break;
        case 'listarSucursales':
            $controladorSucursal = new contoladorSucursal();
            $controladorSucursal->listarSucursales();
            unset($controladorSucursal);
            break;
        case 'eliminarSucursal':
            $controladorSucursal = new contoladorSucursal();
            $controladorSucursal->eliminarSucursal($_POST['id']);
            unset($controladorSucursal);
            break;
        case 'seleccionarSucursal':
            $controladorSucursal = new contoladorSucursal();
            $controladorSucursal->seleccionarSucursal($_POST['id']);
            unset($controladorSucursal);
            break;
        /* FIN Servicios de la sucursal */

        /* INICIO Servicios de persona */
        case 'registrarPersona':
            $controladorPersona = new contoladorPersona();
            $controladorPersona->registrarPersona($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['telefono']);
            unset($controladorPersona);
            break;
        case 'listarPersonas':
            $controladorPersona = new contoladorPersona();
            $controladorPersona->listarPersonas();
            unset($controladorPersona);
            break;
        case 'listarTrabajadores':
            $controladorPersona = new contoladorPersona();
            $controladorPersona->listarTrabajadores($_POST['idproducto']);
            unset($controladorPersona);
            break;
        case 'eliminarPersona':
            $controladorPersona = new contoladorPersona();
            $controladorPersona->eliminarPersona($_POST['id']);
            unset($controladorPersona);
            break;
        case 'seleccionarPersona':
            $controladorPersona = new contoladorPersona();
            $controladorPersona->seleccionarPersona($_POST['id']);
            unset($controladorPersona);
            break;
        /* FIN Servicios de persona */

        /* INICIA Servicios de sucursalProductos */
        case 'registrarSucursalProducto':
            $controladorAsignacionProducto = new contoladorSucursalProducto();
            $controladorAsignacionProducto->registrarSucursalProducto($_POST['id'], $_POST['idsucursal'], $_POST['idproducto']);
            unset($controladorAsignacionProducto);
            break;
        case 'listarSucursalProductos':
            $controladorAsignacionProducto = new contoladorSucursalProducto();
            $controladorAsignacionProducto->listarSucursalProductos();
            unset($controladorAsignacionProducto);
            break;
        case 'seleccionarSucursalProducto':
            $controladorAsignacionProducto = new contoladorSucursalProducto();
            $controladorAsignacionProducto->seleccionarSucursalProducto($_POST['id']);
            unset($controladorAsignacionProducto);
            break;
        case 'seleccionarSucursalProductos':
            $controladorAsignacionProducto = new contoladorSucursalProducto();
            $controladorAsignacionProducto->seleccionarSucursalProductos($_POST['idsucursal']);
            unset($controladorAsignacionProducto);
            break;
        case 'eliminarSucursalProducto':
            $controladorAsignacionProducto = new contoladorSucursalProducto();
            $controladorAsignacionProducto->eliminarSucursalProducto($_POST['id']);
            unset($controladorAsignacionProducto);
            break;
        /* FIN Servicios del sucursalProducto */

        /* INICIA Servicios de sucursalTrabajador */
        case 'registrarSucursalTrabajador':
            $controladorAsignacionTrabajador = new contoladorSucursalTrabajador();
            $controladorAsignacionTrabajador->registrarSucursalTrabajador($_POST['id'], $_POST['idproducto'], $_POST['idtrabajador']);
            unset($controladorAsignacionTrabajador);
            break;
        case 'listarSucursalTrabajadores':
            $controladorAsignacionTrabajador = new contoladorSucursalTrabajador();
            $controladorAsignacionTrabajador->listarSucursalTrabajadores();
            unset($controladorAsignacionTrabajador);

            break;
        case 'seleccionarSucursalTrabajador':
            $controladorAsignacionTrabajador = new contoladorSucursalTrabajador();
            $controladorAsignacionTrabajador->seleccionarSucursalTrabajador($_POST['id']);
            unset($controladorAsignacionTrabajador);
            break;
        case 'eliminarSucursalTrabajador':
            $controladorAsignacionTrabajador = new contoladorSucursalTrabajador();
            $controladorAsignacionTrabajador->eliminarSucursalTrabajador($_POST['id']);
            unset($controladorAsignacionTrabajador);
            break;
        /* FIN Servicios del sucursalTrabajador */

        /* INICIA Servicios de reserva */
        case 'registrarReserva':
            $controladorReserva = new contoladorReserva();
            $controladorReserva->registrarReserva($_POST['idsucursalproducto'],$_POST['idcliente'], $_POST['idtrabajador'], $_POST['fecha'], $_POST['idhorario']);
            unset($controladorReserva);
            break;
        case 'listarReservas':
            $controladorReserva = new contoladorReserva();
            $controladorReserva->listarReservas();
            unset($controladorReserva);
            break;
        case 'eliminarReserva':
            $controladorReserva = new contoladorReserva();
            $controladorReserva->eliminarReserva($_POST['id']);
            unset($controladorReserva);
            break;
        /* FIN Servicios del reserva*/

        /* ININCIO Servicios de horario*/
        case 'listarHorarios':
            $controladorHorario = new contoladorHorario();
            $controladorHorario->listarHorarios($_POST['idpersona'],$_POST['fecha']);
            unset($controladorHorario);
            break;
        /* FIN Servicios de horario*/

        default:
            echo json_encode('Funcion no reconocida');
            break;
    }
}
