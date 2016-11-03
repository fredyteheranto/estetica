<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Productos | Estetica</title>
        <!-- Bootstrap core CSS -->
        <link href="../lib/css/bootstrap.min.css" rel="stylesheet">
        <link href="../lib/fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="../lib/css/animate.min.css" rel="stylesheet">
        <!-- Custom styling plus plugins -->
        <link href="../lib/css/custom.css" rel="stylesheet">
        <link href="../lib/css/icheck/flat/green.css" rel="stylesheet">
        <!-- ion_range -->
        <link rel="stylesheet" href="../lib/css/normalize.css" />
        <link href="../lib/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="../lib/js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../lib/js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../lib/js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../lib/js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../lib/css/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css"/>
        <script src="../lib/js/jquery.min.js"></script>

    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div style="border: 0;">
                            <a href="index.html"><img class="img-responsive" width="70%" style="margin: 0 auto !important;padding-top: 10px;" src="../lib/images/logonpng"/></a>
                        </div>
                        <div class="clearfix"></div>
                        <!-- menu prile quick info -->
                        <div class="profile">
                            <div class="profile_pic">
                            </div>
                            <div class="profile_info">
                            </div>
                        </div>
                        <br />
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <h3>&nbsp</h3>
                                <ul class="nav side-menu">
                                    <li><a><i class="fa fa-table"></i>Administrar<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="sucursales.php" >Sucursales</a></li>
                                            <li><a href="personas.php" >Personas</a></li>
                                            <li><a href="productos.php" class="active" >Productos</a></li>
                                            <li><a href="reservas.php"  >Reservas</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-table"></i>Asignaciones<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="asignatrabajador.php" >Trabajador</a></li>
                                            <li><a href="asignaproductos.php" >Producto</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /top navigation -->
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Administrar</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="x_panel" style="">
                                    <div class="x_title">
                                        <h2 id="titulo">Producto</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <form id="formulario-producto" action="" method="post">
                                        <div class="x_content">
                                            <div id="form" class="form-horizontal animated bounce form-label-left">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre Producto</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="hidden" id="id" class="form-control has-feedback-left" required="required">
                                                        <input type="text" id="nombre" class="form-control has-feedback-left">
                                                        <span class="fa fa-keyboard-o form-control-feedback left" aria-hidden="true"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Detalle</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12 xdisplay_inputx form-group has-feedback">
                                                        <span class="fa fa-keyboard-o form-control-feedback left" aria-hidden="true"></span>
                                                        <textarea type="text" class="form-control has-feedback-left" required="required" id="detalle" placeholder="Detalle del producto"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Costo</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12 xdisplay_inputx form-group has-feedback">
                                                        <input type="number" min="0" class="form-control has-feedback-left" required="required" id="costo" placeholder="Costo del producto">
                                                        <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                        <button id="enviar" class="btn btn-success">Guardar</button>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                    <table id="tabla-productos" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Costo</th>
                                                <th>Detalle</th>
                                                <th>Actualizar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
</div>
</div>
<script src="../lib/js/bootstrap.min.js"></script>
<!-- Datatables-->
<script src="../lib/js/datatables/jquery.dataTables.min.js"></script>
<script src="../lib/js/datatables/dataTables.bootstrap.js"></script>
<script src="../lib/js/datatables/dataTables.buttons.min.js"></script>
<script src="../lib/js/datatables/buttons.bootstrap.min.js"></script>
<script src="../lib/js/datatables/jszip.min.js"></script>
<script src="../lib/js/datatables/pdfmake.min.js"></script>
<script src="../lib/js/datatables/vfs_fonts.js"></script>
<script src="../lib/js/datatables/buttons.html5.min.js"></script>
<script src="../lib/js/datatables/buttons.print.min.js"></script>
<script src="../lib/js/datatables/dataTables.fixedHeader.min.js"></script>
<script src="../lib/js/datatables/dataTables.keyTable.min.js"></script>
<script src="../lib/js/datatables/dataTables.responsive.min.js"></script>
<script src="../lib/js/datatables/responsive.bootstrap.min.js"></script>
<script src="../lib/js/datatables/dataTables.scroller.min.js"></script>
<!-- PNotify -->
<script type="text/javascript" src="../lib/js/notify/pnotify.custom.min.js"></script>
<!-- bootstrap progress js -->
<script src="../lib/js/progressbar/bootstrap-progressbar.min.js"></script>
<script src="../lib/js/nicescroll/jquery.nicescroll.min.js"></script>
<!-- icheck -->
<script src="../lib/js/icheck/icheck.min.js"></script>
<script src="../lib/js/custom.js"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="../lib/js/moment/moment.min.js"></script>
<script type="text/javascript" src="../lib/js/datepicker/daterangepicker.js"></script>
<script type="text/javascript" src="../lib/js/config.js"></script>

<!-- /datepicker -->
<script type="text/javascript">
    var tablaProductos;
    $(document).ready(function () {
        tablaProductos = $('#tabla-productos').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: '<i class="fa fa-file-excel-o"></i> Exportar a Excel',
                    titleAttr: 'Excel'
                }
            ]});
        listarProductos();
    });

    $("#formulario-producto").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: {funcion: 'registrarProducto', id: $("#id").val(), nombre: $("#nombre").val(), detalle: $('#detalle').val(), costo: $("#costo").val()},
            success: function (data, x, pS) {
                if (pS.status === 304) {
                    notify('Notificación', 'No se realizaron cambios', 'succesess');
                }
                if (pS.status === 200) {
                    notify('Notificación', data.estado, 'warning');
                    listarProductos();
                }
            },
            error: function (e) {
                notify('Error', 'Error al procesar los datos', 'danger');
            }
        });
    });

    function listarProductos() {
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: {funcion: 'listarProductos'},
            success: function (datos, x, pS) {
                if (pS.status === 204) {
                    notify('Notificación', 'No se encontraron registros', 'warning');
                }
                tablaProductos.row().clear().draw(false);
                if (pS.status === 200) {
                    $.each(datos, function (i, producto) {
                        tablaProductos.row.add([producto.nombre, producto.costo, producto.detalle, '<button type="button" data-id="' + producto.id + '" class="actualizar-notificacion btn btn-primary">Actualizar</button>', '<button type="button"  data-id="' + producto.id + '"  class="eliminar-notificacion btn btn-danger">Eliminar</button>']).draw(false);
                    });
                    $(".eliminar-notificacion").click(function () {
                        eliminarProducto($(this).data('id'));
                    });

                    $(".actualizar-notificacion").click(function () {
                        seleccionarProducto($(this).data('id'));
                    });
                }
            },
            error: function (e) {
                notify('Error', 'Error al procesar los datos', 'danger');
            }
        });
    }

    function eliminarProducto(id) {
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: {funcion: 'eliminarProducto', id: id},
            success: function (datos, x, pS) {
                if (pS.status === 204) {
                    notify('Notificación', 'No se encontraron registros', 'warning');
                }

                if (pS.status === 200) {
                    notify('Eliminando', datos.estado, 'success');
                    listarProductos();
                }
            },
            error: function (e) {
                notify('Error', 'Error al procesar los datos', 'danger');
            }
        });
    }
    function seleccionarProducto(id) {
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: {funcion: 'seleccionarProducto', id: id},
            success: function (datos, x, pS) {
                if (pS.status === 204) {
                    notify('Notificación', 'No se encontraron registros', 'warning');
                }
                if (pS.status === 200) {
                    $("#id").val(datos.id);
                    $("#nombre").val(datos.nombre);
                    $("#costo").val(datos.costo);
                    $("#detalle").val(datos.detalle);
                }
            },
            error: function (e) {
                notify('Error', 'Error al procesar los datos', 'danger');
            }
        });
    }


    function notify(title, text, type) {
        new PNotify({
            title: title,
            text: text,
            type: type,
            delay: 2000
        });
    }
</script>
</body>
</html>