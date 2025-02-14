<?php
session_start();

$conn = new mysqli($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $_SESSION['dbname']);

mysqli_set_charset($conn, 'utf8mb4');

$usuario_session= $_SESSION['id_usuario'];

$id_proyecto = $_POST['id_proyecto'];
$txt_nombre_proyecto = $_POST['txt_nombre_proyecto'];
$cmb_region = $_POST['cmb_region'];
$txt_direccion = $_POST['txt_direccion'];
$txt_inicio = $_POST['txt_inicio'];
$txt_termino = $_POST['txt_termino'];
$txt_rut_cliente = $_POST['txt_rut_cliente'];
$txt_nombre_cliente = $_POST['txt_nombre_cliente'];
$txt_presupuesto = $_POST['txt_presupuesto'];
$cmb_tipo = $_POST['cmb_tipo'];
$edita = $_POST['edita'];

if ($edita == 0) {
    // Inserción de un nuevo registro
    $sql = "INSERT INTO proyectos (
                nombre, region, direccion, inicio, termino, rut_cliente, nombre_cliente, presupuesto, tipo, usuario_crea, estado
            ) VALUES (
                upper('$txt_nombre_proyecto'), upper('$cmb_region'), upper('$txt_direccion'), '$txt_inicio', '$txt_termino', '$txt_rut_cliente', upper('$txt_nombre_cliente'), '$txt_presupuesto', upper('$cmb_tipo'), '$usuario_session', 1
            )";

    $result = $conn->query($sql);

    if ($result) {
        echo json_encode(['codigo' => 0, 'mensaje' => 'Registro creado correctamente']);
    } else {
        echo json_encode(['codigo' => 2, 'mensaje' => 'Error al crear el registro', 'error' => $conn->error]);
    }
} else if ($edita == 1) {
    // Actualización de un registro existente
    $sql = "UPDATE proyectos SET 
                nombre = upper('$txt_nombre_proyecto'),
                region = upper('$cmb_region'),
                direccion = upper('$txt_direccion'),
                inicio = '$txt_inicio',
                termino = '$txt_termino',
                rut_cliente = '$txt_rut_cliente',
                nombre_cliente = upper('$txt_nombre_cliente'),
                presupuesto = '$txt_presupuesto',
                tipo = upper('$cmb_tipo'),
                usuario_crea = '$usuario_session',
                estado = 1
            WHERE id = $id_proyecto";

    $result = $conn->query($sql);

    if ($result) {
        echo json_encode(['codigo' => 0, 'mensaje' => 'Registro actualizado correctamente']);
    } else {
        echo json_encode(['codigo' => 2, 'mensaje' => 'Error al actualizar el registro', 'error' => $conn->error]);
    }
}

