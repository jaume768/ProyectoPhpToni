<!DOCTYPE html>
<html>
<head>
    <title>Registro Viajero</title>
    <link rel="stylesheet" href="css/registro.css">
</head>
<body>
<div class="container">
        <h2>REGISTRO</h2>
        <form action="../controllers/auth_controller.php" method="post">
            <input type="hidden" name="action" value="register"> <!-- Hidden field to indicate the action -->
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?><br>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" placeholder="Nombre" maxlength="100" required><br>
            <label for="apellido1">Primer Apellido: </label>
            <input type="text" name="apellido1" placeholder="Primer Apellido" maxlength="100" required><br>
            <label for="apellido2">Segundo Apellido: </label>
            <input type="text" name="apellido2" placeholder="Segundo Apellido" maxlength="100" required><br>
            <label for="direccion">Dirección: </label>
            <input type="text" name="direccion" placeholder="Dirección" maxlength="100" required><br>
            <label for="codigoPostal">Código Postal: </label>
            <input type="text" name="codigoPostal" placeholder="Código Postal" minlength="5" maxlength="5" required><br>
            <label for="ciudad">Ciudad: </label>
            <input type="text" name="ciudad" placeholder="Ciudad" maxlength="100" required ><br>
            <label for="pais">País: </label>
            <input type="text" name="pais" placeholder="País" maxlength="100" required ><br>
            <label for="email">Email: </label>
            <input type="email" name="email" placeholder="Correo Electrónico" maxlength="100" required><br>
            <label for="password">Contraseña: </label>
            <input type="password" name="password" placeholder="Contraseña" maxlength="100" required><br> 
            <button type="submit" value="Register">Aceptar</button><br>
        </form>
        <a class="login-link" href="login_view.php">¿Ya tienes cuenta? Haz login</a>
    </div>

</body>
</html>
