<?php
session_start();

$servername=$_SESSION['servername'] ;
$username=$_SESSION['username'] ;
$password=$_SESSION['password'] ;
$dbname=$_SESSION['dbname'] ;

// print_r($_SESSION);

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

$filas = [];


if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        $filas[] = [
            'id' => $row['id'],
            'rut' => $row['rut'],
            'clave' => $row['clave'],
            'nombre' => $row['nombre'],
            'apellidos' => $row['apellidos'],
            'fecha_nacimiento' => $row['fecha_nacimiento'],
            'contacto' => $row['contacto'],
            'email' => $row['email'],
            'fono_emergencia' => $row['fono_emergencia'],
            'tipo' => $row['tipo'],
            'estado' => $row['estado'],
            'fecha_creacion' => substr($row['fecha_creacion'], 0, 10),
        ];
    }
}


echo json_encode(['data' => $filas]);

