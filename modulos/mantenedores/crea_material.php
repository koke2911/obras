<?php
session_start();

$conn = new mysqli($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $_SESSION['dbname']);

$usuario_session = $_SESSION['id_usuario'];

$id_material = $_POST['id_material'];
$txt_nombre_material = $_POST['txt_nombre_material'];
$cmb_tipo = $_POST['cmb_tipo'];
$edita = $_POST['edita'];

if ($edita == 0) {
    // Inserción de un nuevo registro
    $sql = "INSERT INTO materiales (
                nombre, tipo, estado
            ) VALUES (
                upper('$txt_nombre_material'), upper('$cmb_tipo'), 1
            )";

    $result = $conn->query($sql);

    if ($result) {
        echo json_encode(['codigo' => 0, 'mensaje' => 'Registro creado correctamente']);
    } else {
        echo json_encode(['codigo' => 2, 'mensaje' => 'Error al crear el registro', 'error' => $conn->error]);
    }
} else if ($edita == 1) {
    // Actualización de un registro existente
    $sql = "UPDATE materiales SET 
                nombre = '$txt_nombre_material',
                tipo = '$cmb_tipo',
                estado = 1
            WHERE id = $id_material";

    $result = $conn->query($sql);

    if ($result) {
        echo json_encode(['codigo' => 0, 'mensaje' => 'Registro actualizado correctamente']);
    } else {
        echo json_encode(['codigo' => 2, 'mensaje' => 'Error al actualizar el registro', 'error' => $conn->error]);
    }
}

