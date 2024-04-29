<?php
include '../config/db.php';

session_start();

switch ($_POST['action']) {
    case 'register':
        registerUser($conn);
        break;
    case 'login':
        loginUser($conn);
        break;
}

function registerUser($conn) {
    // Recibir los datos del formulario
    extract($_POST);

    // Check if 'rol' is empty and assign a default value
    if (empty($rol)) {
        $rol = 'Particular'; // Default role if none provided
    }

    // Encriptar la contraseña
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Preparar y ejecutar la consulta
    $sql = "INSERT INTO transfer_viajeros (nombre, apellido1, apellido2, direccion, codigoPostal, ciudad, pais, email, password, rol) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss", $nombre, $apellido1, $apellido2, $direccion, $codigoPostal, $ciudad, $pais, $email, $passwordHash, $rol);

    if ($stmt->execute()) {
        echo '<script>window.location.href="../views/login_view.php?msg=Registro exitoso. Puede iniciar sesión ahora."</script>';
    } else {
        echo '<script>window.location.href="../views/registro_usuario_view.php?error=Error al registrar: ' . addslashes($stmt->error) . '"</script>';
    }

    $stmt->close();
    $conn->close();
}


function loginUser($conn) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consultar base de datos para el email y contraseña
    $sql = "SELECT id_viajero, password, rol FROM transfer_viajeros WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;
            $_SESSION['usuario_id'] = $row['id_viajero'];
            $_SESSION['rol'] = $row['rol']; // Guardar rol en sesión
            if ($row['rol'] === 'Administrador') {
                echo '<script>window.location.href="../views/admin_view.php";</script>';
            } else if ($row['rol'] === 'Particular') {
                echo '<script>window.location.href="../views/particular_view.php";</script>';
            } else if($row['rol'] === 'Conductor'){
                echo '<script>window.location.href="../views/conductor_view.php";</script>';
            }else {
                echo '<script>window.location.href="../views/login_view.php";</script>';
            }
        } else {
            echo '<script>window.location.href="../views/login_view.php?msg=Contraseña incorrecta&email=' . urlencode($email) . '";</script>';
        }
    } else {
        echo '<script>window.location.href="../views/login_view.php?msg=Usuario no encontrado";</script>';
    }

    $stmt->close();
    $conn->close();
}

?>
