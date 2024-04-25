<?php
include '../config/db.php';

$email = $_POST['email'];
$password = $_POST['password'];

// Esta es una mala práctica, pero según tu petición, utilizaremos 'admin' para la demostración.
if ($email === 'admin' && $password === 'admin') {
    session_start();
    $_SESSION['usuario_id'] = 'admin';
    $_SESSION['es_admin'] = true; // Flag para identificar al admin
    echo '<script>window.location.href="../views/admin_view.php";</script>';
    exit();
}

$sql = "SELECT id, password FROM transfer_viajeros WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['usuario_id'] = $row['id'];
        $_SESSION['es_admin'] = false; // No es admin
        echo '<script>window.location.href="tu_pagina_principal.php";</script>';
    } else {
        echo '<script>window.location.href="../views/login_view.php?msg=Contraseña incorrecta&email=' . urlencode($email) . '";</script>';
    }
} else {
    echo '<script>window.location.href="../views/login_view.php?msg=Usuario no encontrado";</script>';
}

$stmt->close();
$conn->close();
?>
