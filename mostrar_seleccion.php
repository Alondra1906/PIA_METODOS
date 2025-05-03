<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos Seleccionados</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #fff;
            padding: 30px;
            color: #333;
        }
        h2 {
            text-align: center;
        }
        .producto {
            background-color: #f8f8f8;
            margin: 10px auto;
            padding: 10px;
            border-radius: 6px;
            max-width: 600px;
        }
        .total {
            font-weight: bold;
            font-size: 1.2em;
            text-align: center;
            margin-top: 20px;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 30px;
            color: #3498db;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
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
    </style>
</head>
<body>

<h2>Productos Seleccionados</h2>

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
            <a href="http://localhost/catalogo/index.php"><b>Producto</b></a>
          </div>
          <div class="nav-item">
            <img src="imgpagprin/contacto.png" alt="Contacto">
            <a href="contacto.html"><b>Contacto</b></a>
          </div>
        </div>
      </div>
    </nav>

<?php
$productos = [
    ['id' => 1, 'nombre' => 'Tratamiento para gasolina', 'precio' => 150.00],
    ['id' => 2, 'nombre' => 'Infla-llantas', 'precio' => 140.50],
    ['id' => 3, 'nombre' => 'Lubricante aflojatodo', 'precio' => 100.00],
    ['id' => 4, 'nombre' => 'Silicone platinum', 'precio' => 50.00],
    ['id' => 5, 'nombre' => 'Sellador de Rosca Resistencia Permanente', 'precio' => 120.00],
    ['id' => 6, 'nombre' => 'Sellador para Radiadores', 'precio' => 75.00],
    ['id' => 7, 'nombre' => 'Sellador de juntas Sellac', 'precio' => 80.00],
    ['id' => 8, 'nombre' => 'Limpiador Interno de motor', 'precio' => 125.00],
    ['id' => 9, 'nombre' => 'Líquido Arrancador de Motor', 'precio' => 200.00],
    ['id' => 10, 'nombre' => 'Limpiador de Inyectores Presurizado', 'precio' => 199.99],
    ['id' => 11, 'nombre' => 'Limpiador de Inyectores para Boya', 'precio' => 180.50],
    ['id' => 12, 'nombre' => 'Limpiador de inyectores Concentrado', 'precio' => 67.00],
    ['id' => 13, 'nombre' => 'Limpiador de frenos', 'precio' => 75.99],
    ['id' => 14, 'nombre' => 'Silicone Black High Temp RTV', 'precio' => 50.00],
    ['id' => 15, 'nombre' => 'Anticongelante Refrigerante', 'precio' => 280.00],
    ['id' => 16, 'nombre' => 'Inhibidor de Óxido', 'precio' => 145.55],
    ['id' => 17, 'nombre' => 'incrementador de octanaje de Gasolina', 'precio' => 60.50],
    ['id' => 18, 'nombre' => 'Desengrasante para motor', 'precio' => 87.00],
    ['id' => 19, 'nombre' => 'Lubricante de cadenas', 'precio' => 70.00],
    ['id' => 20, 'nombre' => 'Silicon RTV Cobre', 'precio' => 80.00],
];

$total = 0;

if (isset($_POST['productos'])) {
    $seleccion = $_POST['productos'];
    foreach ($productos as $prod) {
        if (in_array($prod['id'], $seleccion)) {
            echo "<div class='producto'>{$prod['nombre']} - \$" . number_format($prod['precio'], 2) . "</div>";
            $total += $prod['precio'];
        }
    }
    echo "<div class='total'>Total: \$" . number_format($total, 2) . "</div>";
} else {
    echo "<p style='text-align:center;'>No seleccionaste ningún producto.</p>";
}
?>

<a href="index.php">← Volver al catálogo</a>

</body>
</html>
