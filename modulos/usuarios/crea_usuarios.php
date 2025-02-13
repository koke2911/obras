<?php 
session_start();

$conn = new mysqli($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $_SESSION['dbname']);


    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $contacto = $_POST['contacto'];
    $email = $_POST['email'];
    $tipo = $_POST['tipo'];
    $estado = $_POST['estado'];
    $btn_nuevo = $_POST['btn_nuevo'];
    $btn_guardar = $_POST['btn_guardar'];
    $btn_cancelar = $_POST['btn_cancelar'];
    $fecha_creacion = $_POST['fecha_creacion'];
    $edita = $_POST['edita'];
    $id_usuario= $_POST['id_usuario'];

     
    $rut_sin_puntos = str_replace('.', '', $rut);
    $rut = substr($rut_sin_puntos, 0, -1) . '' . substr($rut_sin_puntos, -1);

    
    $caracteres = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&*()_+-=[]{}|;:,./?";
    $nuevaPass = substr($rut, 0, 4) . substr(str_shuffle($caracteres), 0, 4);

    $encript_Pass= hash('md5', $nuevaPass);

    
    $sql_check = "SELECT COUNT(*) as count FROM usuarios WHERE rut = '$rut'";
    $result_check = $conn->query($sql_check);
    $row_check = $result_check->fetch_assoc()['count'];

    if ($row_check == 0 && $edita == 0) {
        
        $sql = "INSERT INTO usuarios (rut, clave, nombre, apellidos, fecha_nacimiento, contacto, email,  tipo, estado, fecha_creacion) 
        VALUES ('$rut', '$encript_Pass', '$nombre', '$apellidos', '$fecha_nacimiento', '$contacto', '$email',  '$tipo', 1, date_format('$fecha_creacion','%Y-%m-%d'))";
        
        $result = $conn->query($sql);

        if($result){
            echo json_encode(['codigo' => 0, 'mensaje' => 'Contraseña: ' . $nuevaPass]);
        }else{
            echo json_encode(['codigo' => 2, 'mensaje' => 'Error al guardar el usuario']);
        }

    } else if($edita == 1){
        
        $sql = "UPDATE usuarios SET rut='$rut',  nombre='$nombre', apellidos='$apellidos', fecha_nacimiento='$fecha_nacimiento', contacto='$contacto', email='$email',  tipo='$tipo', estado=1, fecha_creacion=date_format('$fecha_creacion','%Y-%m-%d') 
        WHERE id='$id_usuario'";
        $result = $conn->query($sql);
        
        echo json_encode(['codigo' => 0, 'mensaje' => 'Usuario modificado correctamente']);

    }else{
        echo json_encode(['codigo' => 2, 'pamensajess' => 'El rut ya existe']);
    }



?>    