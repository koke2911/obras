<?php
session_start();

$conn = new mysqli($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $_SESSION['dbname']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id_usuario = $_POST['id_usuario'];

$caracteres = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&*()_+-=[]{}|;:,./?";
$nuevaPass = substr(str_shuffle($caracteres), 0, 8);

$encript_Pass = hash('md5', $nuevaPass);

// echo $nuevaPass;

$sql = "UPDATE usuarios SET clave='$encript_Pass' WHERE ID=$id_usuario";



if ($conn->query($sql) === TRUE) {
    echo json_encode(['codigo' => 0, 'mensaje' => 'Contraseña: '. $nuevaPass]);
} else {
    echo json_encode(['codigo' => 2, 'mensaje' => 'Error al resetear contraseña del usuario']);
}
