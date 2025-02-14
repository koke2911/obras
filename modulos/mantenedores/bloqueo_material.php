<?php
session_start();

$conn = new mysqli($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $_SESSION['dbname']);


$id_material = $_POST['id_material'];
$estado = $_POST['estado'];

if ($estado == 1) {
    $nuevoEstado = 0;
    $obs = 'Material Bloqueado Correctamente';
} else {
    $nuevoEstado = 1;
    $obs = 'Material Desbloqueado Correctamente';
}


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE materiales SET ESTADO=$nuevoEstado WHERE ID=$id_material";



if ($conn->query($sql) === TRUE) {
    echo json_encode(['codigo' => 0, 'mensaje' => $obs]);
} else {
    echo json_encode(['codigo' => 2, 'mensaje' => 'Error al modificar material']);
}
