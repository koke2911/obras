<?php
session_start();

$conn = new mysqli($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $_SESSION['dbname']);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id_usuario=$_GET['id_usuario'];

$sql="SELECT * FROM usuarios WHERE ID=$id_usuario";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $row['fecha_creacion']=substr($row['fecha_creacion'], 0, 10);
        echo json_encode($row);
    }
} else {
    echo json_encode(['codigo' => 2, 'mensaje' => 'Error al obtener usuario']);
}
$conn->close();

