<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Refacciones</title>
    <style>
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

<div class="contenido">
    <h1>Catálogo de Productos</h1>
</div>

<form method="post" action="mostrar_seleccion.php">

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

    <div class="catalogo">
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

        foreach ($productos as $p) {
            echo "<div class='producto'>";
            echo "<label><input type='checkbox' name='productos[]' value='{$p['id']}'> {$p['nombre']} - \$" . number_format($p['precio'], 2) . "</label>";
            echo "</div>";
        }
        ?>
    </div>
    <input class="boton" type="submit" value="Ver productos seleccionados">
</form>

</body>
</html>
