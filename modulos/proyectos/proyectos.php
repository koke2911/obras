<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Proyecto</title>
    <link rel="stylesheet" href="../../static/bootstrap-4.6/bootstrap.min.css">
    <link rel="stylesheet" href="../../static/vendor/datepicker/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="../../static/vendor/datatables/dataTables.cellEdit.css">
    <link rel="stylesheet" href="../../static/css/select.dataTables.min.css">
    <link href="../../static/js/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">

    <!-- <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script> -->
    <script src="../../static/js/fontawesome.all.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Registro de Proyectos</h2>
        <div class="card shadow mb-12">
            <div class="card-body">
                <div class="container-fluid">
                    <center>
                        <button class="btn btn-warning" style="margin: 10px;" id="btn_nuevo">Nuevo</button>
                        <button class="btn btn-primary" style="margin: 10px;" id="btn_guardar" disabled>Guardar</button>
                        <button class="btn btn-danger" style="margin: 10px;" id="btn_cancelar" disabled>Cancelar</button>
                    </center>
                </div>
            </div>
        </div>
        <form id="proyectosForm">
            <div class="card mb-4">
                <div class="card-header" data-toggle="collapse" data-target="#datosProyecto" aria-expanded="false" aria-controls="datosProyecto">
                    <i class="fas fa-male mr-1"></i> Datos del Proyecto
                </div>
                <div class="card shadow mb-12 collapse" id="datosProyecto">
                    <!-- <div class="card shadow mb-12"> -->
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="id_proyecto" class="form-label">Id #</label>
                                            <input type="text" class="form-control" id="id_proyecto" name="id_proyecto" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="txt_nombre_proyecto" class="form-label">Nombre Proyecto</label>
                                            <input type="text" class="form-control" id="txt_nombre_proyecto" name="txt_nombre_proyecto" required disabled maxlength="50">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="cmb_region" class="form-label">Region</label>
                                            <select class="form-control" id="cmb_region" name="cmb_region" required disabled>
                                                <option value=""></option>
                                                <option value="I">I. Tarapac&aacute;</option>
                                                <option value="II">II. Antofagasta</option>
                                                <option value="III">III. Atacama</option>
                                                <option value="IV">IV. Coquimbo</option>
                                                <option value="V">V. Valpara&iacute;so</option>
                                                <option value="VI">VI. O'Higgins</option>
                                                <option value="VII">VII. Maule</option>
                                                <option value="VIII">VIII. Biob&iacute;o</option>
                                                <option value="IX">IX. La Araucan&iacute;a</option>
                                                <option value="X">X. Los Lagos</option>
                                                <option value="XI">XI. Ays&eacute;n</option>
                                                <option value="XII">XII. Magallanes</option>
                                                <option value="RM">RM. Metropolitana</option>
                                                <option value="XIV">XIV. Los R&iacute;os</option>
                                                <option value="XV">XV. Arica y Parinacota</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="txt_direccion" class="form-label">Direcci&oacute;n</label>
                                            <input type="text" class="form-control" id="txt_direccion" name="txt_direccion" required disabled maxlength="100">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="txt_inicio" class="form-label">Fecha Inicio</label>
                                            <input type="date" class="form-control" id="txt_inicio" name="txt_inicio" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="txt_termino" class="form-label">Fecha T&eacute;rmino</label>
                                            <input type="date" class="form-control" id="txt_termino" name="txt_termino" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="txt_rut_cliente" class="form-label">Rut Cliente (11111111-1)</label>
                                            <input type="text" class="form-control" id="txt_rut_cliente" name="txt_rut_cliente" required disabled maxlength="12">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="txt_nombre_cliente" class="form-label">Nombre Cliente</label>
                                            <input type="text" class="form-control" id="txt_nombre_cliente" name="txt_nombre_cliente" required disabled maxlength="50">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="txt_presupuesto" class="form-label">Presupuesto</label>
                                            <input type="number" class="form-control" id="txt_presupuesto" name="txt_presupuesto" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="cmb_tipo" class="form-label">Tipo</label>
                                            <select class="form-control" id="cmb_tipo" name="cmb_tipo" required disabled>
                                                <option value=""></option>
                                                <option value="CASA">CASA</option>
                                                <option value="APARTAMENTO">APARTAMENTO</option>
                                                <option value="EDIFICIO">EDIFICIO</option>
                                                <option value="OFICINA">OFICINA</option>
                                                <option value="OTRO">OTRO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-1">
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-house-user mr-1"></i> Listado de Proyectos</div>
                    <div class="card shadow mb-12">
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="grid_proyectos" name="grid_proyectos">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Id #</th>
                                                <th>Nombre</th>
                                                <th>Inicio</th>
                                                <th>Termino</th>
                                                <th>Cliente</th>
                                                <th>Presupuesto</th>
                                                <th>Tipo</th>
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

    <script src="../../static/bootstrap-4.6/jquery-3.6.0.min.js"></script>
    <script src="../../static/bootstrap-4.6/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../../static/vendor/datepicker/moment.min.js"></script>
    <script type="text/javascript" src="../../static/vendor/datepicker/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="../../static/vendor/datepicker/bootstrap-datetimepicker.es.js"></script>
    <script type="text/javascript" src="../../static/vendor/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../../static/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="../../static/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="../../static/vendor/datatables/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="../../static/js/fnReloadAjax.js"></script>
    <script type="text/javascript" src="../../static/vendor/datatables/dataTables.cellEdit.js"></script>
    <script type="text/javascript" src="../../static/vendor/datatables/fnFindCellRowNodes.js"></script>
    <script type="text/javascript" src="../../static/js/jquery-validation/dist/jquery.validate.js"></script>
    <script type="text/javascript" src="../../static/js/sweetalert2/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="../../static/js/Multiple-Select/dist/js/bootstrap-multiselect.min.js"></script>
    <script type="text/javascript" src="../../static/js/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="../../js/proyectos/proyectos.js"></script>