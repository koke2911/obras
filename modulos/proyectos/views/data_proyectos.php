<?php
session_start();

$servername = $_SESSION['servername'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$dbname = $_SESSION['dbname'];

// print_r($_SESSION);

$conn = new mysqli($servername, $username, $password, $dbname);

mysqli_set_charset($conn, 'utf8mb4');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM proyectos where estado=1";
$result = $conn->query($sql);

$filas = [];


if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $filas[] = [            
            'id'=>$row['id'],
            'nombre'=>$row['nombre'],
            'inicio'=>$row['inicio'],
            'termino'=>$row['termino'],
            'nombre_cliente'=>$row['nombre_cliente'],
            'presupuesto'=>$row['presupuesto'],
            'tipo'=>$row['tipo'],
            'region' => $row['region'],
            'direccion' => $row['direccion'],
            'rut_cliente'=>$row['rut_cliente'],
            'estado'=>$row['estado']
            
        ];
    }
}

echo json_encode(['data' => $filas]);       



// ,
//             