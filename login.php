<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Conectar a la base de datos
    $conexion = new mysqli("localhost", "root", "Alondra321", "catalogo");
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Consultar el usuario
    $query = $conexion->prepare("SELECT * FROM usuarios WHERE correo = ?");
    $query->bind_param("s", $correo);
    $query->execute();
    $resultado = $query->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($contrasena, $usuario['contrasena'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Correo no registrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .input-group {
            margin-bottom: 15px;
        }
        label {
            font-size: 14px;
            color: #333;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            margin-top: 5px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #2980b9;
        }
        .error {
            color: red;
            text-align: center;
            font-size: 14px;
            margin-top: 10px;
        }
        .register-link {
            text-align: center;
            margin-top: 15px;
        }
        .register-link a {
            color: #3498db;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f1f1f1;
            padding: 30px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .catalogo {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            max-width: 1000px;
            margin: auto;
        }
        .producto {
            background: #fff;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .producto:hover {
            transform: translateY(-5px);
        }
        .producto label {
            display: flex;
            justify-content: space-between;
            cursor: pointer;
        }
        .boton {
            display: block;
            margin: 30px auto;
            padding: 10px 30px;
            font-size: 16px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        .boton:hover {
            background-color: #2980b9;
        }

        .navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    z-index: 1000;
}

.navbar-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 10px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
  
.logo img {
    width: 60px;
    height: auto;
}

.nav-links {
    display: flex;
    align-items: center;
    gap: 15px;
}
  
.nav-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 5px;
    border-radius: 10px;
    transition: background-color 0.3s ease, transform 0.2s ease;
    cursor: pointer;
}
  
.nav-item:hover {
    background-color: #f0f0f0;
    transform: scale(1.05);
}
  
.nav-item img {
    width: 25px;
    height: 25px;
    margin-bottom: 4px;
}
  
.nav-item a {
    text-decoration: none;
    color: #000;
    font-size: 14px;
    font-weight: bold;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

.contenido {
    margin-top: 100px;
}
    </style>
</head>
<body>

<nav class="navbar">
      <div class="navbar-container">
        <a href="#" class="logo">
          <img src="imgcatalogo/RefaccionariaJAF.png" alt="Logo" class="logonav">
        </a>
    
        <div class="nav-links">
          <div class="nav-item">
            <img src="imgpagprin/inicio.png" alt="Inicio">
            <a href="index.html"><b>Inicio</b></a>
          </div>
          <div class="nav-item">
            <img src="imgpagprin/acercade.png" alt="Acerca de">
            <a href="acercade.html"><b>Acerca de</b></a>
          </div>
          <div class="nav-item">
            <img src="imgpagprin/productos.png" alt="Productos">
            <a href="http://localhost/catalogo/registro.php"><b>Producto</b></a>
          </div>
          <div class="nav-item">
            <img src="imgpagprin/contacto.png" alt="Contacto">
            <a href="contacto.html"><b>Contacto</b></a>
          </div>
        </div>
      </div>
</nav>

<div class="login-container">
    <h2>Iniciar sesión</h2>
    <form action="login.php" method="POST">
        <div class="input-group">
            <label for="correo">Correo</label>
            <input type="email" id="correo" name="correo" required>
        </div>
        <div class="input-group">
            <label for="contrasena">Contraseña</label>
            <input type="password" id="contrasena" name="contrasena" required>
        </div>
        <?php if (isset($error)): ?>
            <div class="error"><?= $error; ?></div>
        <?php endif; ?>
        <button type="submit">Iniciar sesión</button>
    </form>
    <div class="register-link">
        <p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
    </div>
</div>

</body>
</html>
