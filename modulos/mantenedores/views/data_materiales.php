<?php
session_start();

$servername = $_SESSION['servername'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$dbname = $_SESSION['dbname'];

// print_r($_SESSION);

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM materiales where estado=1";
$result = $conn->query($sql);

$filas = [];


if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $filas[] = [
            'id' => $row['id'],
            'nombre' => $row['nombre'],
            'tipo' => $row['tipo'],
            'estado' => $row['estado'],
        ];
    }
}


echo json_encode(['data' => $filas]);
