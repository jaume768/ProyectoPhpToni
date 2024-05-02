<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <h2>LOGIN</h2>
        <form action="../controllers/auth_controller.php" method="post">
            <input type="hidden" name="action" value="login">
            <?php if (isset($_GET['msg'])) { ?>
                <p class="msg"><?php echo $_GET['msg']; ?></p>
            <?php } ?><br>
            <label for="email">Usuario o Email: </label>
            <input type="text" name="email" placeholder="Usuario o Correo Electrónico" maxlength="100" required value="<?php if (isset($_GET['email'])) echo $_GET['email']; ?>"><br><br>
            <label for="password">Contraseña: </label>
            <input type="password" name="password" placeholder="Contraseña" maxlength="100" required><br><br>
            <button type="submit" value="Login">Iniciar Sesión</button><br><br>
            <a href="registro_usuario_view.php">Registrarse</a>
        </form>
    </div>
</body>
</html>
