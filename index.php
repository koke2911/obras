<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ControlAPR</title>
    <link rel="stylesheet" href="static/bootstrap-4.6/bootstrap.min.css">
    <link rel="stylesheet" href="static/vendor/datepicker/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="static/vendor/datatables/dataTables.cellEdit.css">
    <link href="static/js/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">
    <script src="static/js/fontawesome.all.js" crossorigin="anonymous"></script>

</head>

<body style="background-image: url('images/fondo3.jpg'); background-size: cover; background-position: center;">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-4">OBRAS <i class="fas fa-hammer me-2" style="padding-right: 20px;color:#143D59;"></i></h2>
            <form id="loginForm">
                <div class="mb-3">
                    <label for="txt_usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="txt_usuario" name="txt_usuario" placeholder="Ingrese su usuario" required maxlength="13">
                </div>
                <div class="mb-3">
                    <label for="txt_contraseña" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="txt_contraseña" name="txt_contraseña"
                        placeholder="Ingrese su contraseña" required maxlength="10">
                </div>
                <button type="button" class="btn btn-primary w-100" id="btn_ingresar">Ingresar</button>
            </form>
        </div>
    </div>

    <script src="static/bootstrap-4.6/jquery-3.6.0.min.js"></script>
    <script src="static/bootstrap-4.6/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="static/vendor/datepicker/moment.min.js"></script>
    <script type="text/javascript" src="static/vendor/datepicker/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="static/vendor/datepicker/bootstrap-datetimepicker.es.js"></script>
    <script type="text/javascript" src="static/vendor/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="static/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="static/js/dataTables.select.min.js"></script>

    <script type="text/javascript" src="static/vendor/datatables/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="static/js/fnReloadAjax.js"></script>
    <script type="text/javascript" src="static/vendor/datatables/dataTables.cellEdit.js"></script>
    <script type="text/javascript" src="static/vendor/datatables/fnFindCellRowNodes.js"></script>
    <script type="text/javascript" src="static/js/jquery-validation/dist/jquery.validate.js"></script>
    <script type="text/javascript" src="static/js/sweetalert2/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="static/js/Multiple-Select/dist/js/bootstrap-multiselect.min.js"></script>
    <script type="text/javascript" src="static/js/Multiple-Select/dist/js/bootstrap-multiselect.min.js"></script>
    <script type="text/javascript" src="static/js/bootstrap-select/js/bootstrap-select.min.js"></script>


    <script type="text/javascript" src="js/login.js"></script>

</body>

</html>