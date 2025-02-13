<?php
session_start();

$conn = new mysqli($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $_SESSION['dbname']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$id_usuario=$_POST['id_usuario'];
$nuevaPass = $_POST['nuevaPass'];


$encript_Pass = hash('md5', $nuevaPass);


$sql = "UPDATE usuarios SET clave = '$encript_Pass' WHERE id = '$id_usuario'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['codigo' => 0, 'mensaje' => 'Contraseña: ' . $nuevaPass]);
} else {
    echo json_encode(['codigo' => 2, 'pamensajess' => 'Imposible cambiar la contraseña']);

}