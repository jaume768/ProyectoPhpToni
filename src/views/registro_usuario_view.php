<!DOCTYPE html>
<html>
<head>
    <title>Registro Viajero</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 400px;
            padding: 40px;
            border-radius: 5px;
            background-color: #333333;
            text-align: right;
        }
        h2 {
            margin-bottom: 30px;
            color: #ffffff;
            text-align: center;
        }
        .error {
            margin-bottom: 10px;
            color: #ff0000;
            text-align: center;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        select,
        textarea,
        button {
            width: calc(100% - 40px);
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 3px;
            background-color: #444444;
            color: #ffffff;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        label {
            text-align: left;
            display: block;
            margin-bottom: 5px;
        }
        .login-link {
            color: #ffffff;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }
        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>REGISTRO</h2>
        <form action="../controllers/registro_usuario_controller.php" method="post">            
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
            <button type="submit" value="Login">Aceptar</button><br>
        </form>
        <a class="login-link" href="login_view.php">¿Ya tienes cuenta? Haz login</a>
    </div>
</body>
</html>
