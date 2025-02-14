<?php
session_start();

$rut_usuario = $_SESSION['rut_usuario'];
$nombre_usuario = $_SESSION['nombre_usuario'];

if (empty($_SESSION)) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Página Principal</title>
    <link rel="stylesheet" href="../static/bootstrap-4.6/bootstrap.min.css">
    <link rel="stylesheet" href="../static/vendor/datepicker/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="../static/vendor/datatables/dataTables.cellEdit.css">
    <link href="../static/js/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../static/js/fontawesome.all.js" crossorigin="anonymous"></script>

</head>

<body>
    <header class="navbar navbar-expand-lg shadow">
        <div class="container-fluid d-flex justify-content-between">
            <a class="navbar-brand" href="#" style="padding-right: 20px;"><i class="fas fa-bars me-2" id="ocultarBarraLateral" style="padding-right: 20px;"></i>Obras <i class="fas fa-hammer me-2" style="padding-right: 20px;color:#1abc9c"></i></a>
            <span><?php echo strtoupper($nombre_usuario . ' | ' . $rut_usuario); ?></span>
            <div>
                <button class="btn btn-outline-light me-2" id="miPerfil"><i class="fas fa-user"></i> Mi Perfil</button>
                <button class="btn btn-danger" id="cerrarSesion"><i class="fas fa-power-off"></i></button>
            </div>
        </div>
    </header>

    <div class="d-flex flex-column" style="min-height: 100vh;">
        <!-- Menú de navegación horizontal -->
        <nav class="d-flex flex-row justify-content-start align-items-center" style="background-color: #f8f9fa; padding: 10px; white-space: nowrap; overflow-x: auto; width: 100%;">

            <button id="menu_inicio" class="btn btn-light mx-2"><i class="fas fa-home me-2"></i> Inicio</button>

            <div class="dropdown mx-2">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cogs me-2"></i> Mantenedores
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <button id="menu_usuarios" class="btn btn-light mx-2"><i class="fas fa-users me-2"></i> Usuarios</button>
                    <a class="dropdown-item" href="#" id="menu_materiales"><i class="fas fa-calculator me-2"></i> Materiales</a>
                    <!-- <a class="dropdown-item" href="#" id="menu_actividades"><i class="fas fa-shopping-cart me-2"></i> Actividades</a> -->
                </div>
            </div>


            <button id="menu_proyectos" class="btn btn-light mx-2"><i class="fas fa-building me-2"></i> Proyectos</button>
            <button id="menu_usuarios" class="btn btn-light mx-2"><i class="fas fa-building me-2"></i> Actividades</button>
            <button id="menu_ssrs" class="btn btn-light mx-2"><i class="fas fa-user-injured me-2"></i> Trabajadores</button>
            <button id="menu_seguimiento" class="btn btn-light mx-2"><i class="fas fa-chart-bar me-2"></i> Actividades</button>
            <button id="menu_cituacion" class="btn btn-light mx-2"><i class="fas fa-chalkboard-teacher me-2"></i> Cronograma</button>
            <button id="menu_pagos" class="btn btn-light mx-2"><i class="fas fa-dollar-sign me-2"></i> Ficha Proveedores</button>
            <button id="menu_medidores" class="btn btn-light mx-2"><i class="fas fa-file-invoice-dollar me-2"></i> Informe</button>
            <!-- Dropdown corregido -->
            <div class="dropdown mx-2">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cogs me-2"></i> Material
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <a class="dropdown-item" href="#" id="menu_pagos"><i class="fas fa-dollar-sign me-2"></i> Costo Material</a>
                    <a class="dropdown-item" href="#" id="menu_calculo"><i class="fas fa-calculator me-2"></i> Cálculo Material</a>
                    <a class="dropdown-item" href="#" id="menu_compra"><i class="fas fa-shopping-cart me-2"></i> Compra Material</a>
                    <a class="dropdown-item" href="#" id="menu_inventario"><i class="fas fa-warehouse me-2"></i> Inventario</a>
                </div>
            </div>

        </nav>

        <!-- Contenido principal -->
        <main class="flex-grow-1 d-flex">
            <iframe src="" id="principal" style="width: 80%;  border: none;"></iframe>
        </main>
    </div>

    <script src="../static/bootstrap-4.6/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="../static/bootstrap-4.6/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../static/vendor/datepicker/moment.min.js"></script>
    <script type="text/javascript" src="../static/vendor/datepicker/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="../static/vendor/datepicker/bootstrap-datetimepicker.es.js"></script>
    <script type="text/javascript" src="../static/vendor/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../static/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="../static/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="../static/vendor/datatables/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="../static/js/fnReloadAjax.js"></script>
    <script type="text/javascript" src="../static/vendor/datatables/dataTables.cellEdit.js"></script>
    <script type="text/javascript" src="../static/vendor/datatables/fnFindCellRowNodes.js"></script>
    <script type="text/javascript" src="../static/js/jquery-validation/dist/jquery.validate.js"></script>
    <script type="text/javascript" src="../static/js/sweetalert2/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="../static/js/Multiple-Select/dist/js/bootstrap-multiselect.min.js"></script>
    <script type="text/javascript" src="../static/js/Multiple-Select/dist/js/bootstrap-multiselect.min.js"></script>
    <script type="text/javascript" src="../static/js/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="../js/principal.js"></script>
</body>

</html>