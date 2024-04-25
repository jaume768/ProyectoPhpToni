<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
            width: 300px;
            padding: 20px;
            border-radius: 5px;
            background-color: #333333;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #ffffff;
        }
        .msg {
            margin-bottom: 10px;
            color: #ff0000;
        }
        input[type="text"],
        input[type="password"],
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
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
        a {
            color: #4CAF50;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .texto{
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>LOGIN</h2>
        <form action="../controllers/login_controller.php" method="post">            
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
