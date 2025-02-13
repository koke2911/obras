<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Usuario</title>
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
        <h2 class="text-center">Usuarios del Sistema</h2>
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
        <form id="usuariosForm">
            <div class="card mb-4">
                <div class="card-header" data-toggle="collapse" data-target="#datosUsuario" aria-expanded="false" aria-controls="datosUsuario">
                    <i class="fas fa-male mr-1"></i> Datos del Usuario
                </div>
                <div class="card shadow mb-12 collapse" id="datosUsuario">
                    <!-- <div class="card shadow mb-12"> -->
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="rut" class="form-label">Id #</label>
                                            <input type="text" class="form-control" id="id_usuario" name="id_usuario" required disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="rut" class="form-label">RUT (11111111-1)</label>
                                            <input type="text" class="form-control" id="rut" name="rut" required disabled maxlength="12">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" required disabled maxlength="20">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="apellidos" class="form-label">Apellidos</label>
                                            <input type="text" class="form-control" id="apellidos" name="apellidos" required disabled maxlength="30">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required disabled maxlength="10">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="contacto" class="form-label"> Fono Contacto (+56)</label>
                                            <input type="text" class="form-control" id="contacto" name="contacto" required disabled maxlength="9">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" required disabled maxlength="30">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="tipo" class="form-label">Tipo</label>
                                            <select class="form-control" id="tipo" name="tipo" required disabled maxlength="15">
                                                <option value=""></option>
                                                <option value="A">administrador</option>
                                                <option value="U">Usuario</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="estado" class="form-label"> Estado</label>
                                            <select class="form-control" id="estado" name="estado" required disabled maxlength="10">
                                                <option value=""></option>
                                                <option value="1">Activo</option>
                                                <option value="2">Bloquado</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="fecha_creacion" class="form-label">Fecha de Creación</label>
                                            <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" required disabled maxlength="10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- <div class="row">
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                <div class="mb-3"> -->
        <!-- <div style="display: flex; justify-content: center;"> -->
        <!-- <button class="btn btn-warning" style="margin: 10px;" id="btn_nuevo">Nuevo</button>
                    <button class="btn btn-primary" style="margin: 10px;" id="btn_guardar">Guardar</button>
                    <button class="btn btn-secondary" style="margin: 10px;" id="btn_cancelar">Cancelar</button> -->
        <!-- </div>
                </div>
            </div>
        </div> -->

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-1">
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-house-user mr-1"></i> Listado de Usuarios</div>
                    <div class="card shadow mb-12">
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="grid_usuarios" name="grid_usuarios">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>RUT</th>
                                                <th>Nombre</th>
                                                <th>Apellidos</th>
                                                <th>Email</th>
                                                <th>Tipo</th>
                                                <th>Estado</th>
                                                <th>Pass</th>
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
    <script type="text/javascript" src="../../static/js/Multiple-Select/dist/js/bootstrap-multiselect.min.js"></script>
    <script type="text/javascript" src="../../static/js/bootstrap-select/js/bootstrap-select.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script> -->
    <script type="text/javascript" src="../../static/js/datatables.responsive.min.js"></script>
    <script src="../../js/usuarios/usuarios.js"></script>
</body>

</html>