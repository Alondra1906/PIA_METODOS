<!DOCTYPE html>  
<html lang="es">  
<head>  
<meta charset="UTF-8" />  
<title>Catálogo de Refaccionaria</title>  
<style>  
body {  
  font-family: Arial, sans-serif;  
  background-color: #f4f4f4;  
  margin: 0;  
  padding: 20px;  
}  
h1 {  
  text-align: center;  
  color: #333;  
}  
.producto {  
  display: flex;  
  align-items: center;  
  border: 1px solid #ccc;  
  background-color: #fff;  
  margin-bottom: 15px;  
  padding: 10px;  
  border-radius: 8px;  
  transition: box-shadow 0.3s;  
}  
.producto:hover {  
  box-shadow: 0 0 10px rgba(0,0,0,0.2);  
}  
.producto img {  
  width: 100px;  
  height: 100px;  
  object-fit: cover;  
  margin-right: 15px;  
  border-radius: 5px;  
}  
.producto-info {  
  flex: 1;  
}  
.producto-info h3 {  
  margin: 0 0 8px 0;  
  font-size: 1.2em;  
  color: #555;  
}  
.producto-info p {  
  margin: 4px 0;  
  color: #777;  
}  
</style> 
</head>  
<body>  
<h1>Catálogo de Productos</h1>  
<form method="post" action="mostrar_seleccion.php">  
<?php  
// Lista de productos  
$productos = [  
    ['id' => 1, 'nombre' => 'Bujía', 'precio' => 15.00],  
    ['id' => 2, 'nombre' => 'Filtro de Aceite', 'precio' => 8.50],  
    ['id' => 3, 'nombre' => 'Correa de Distribución', 'precio' => 45.00],  
    ['id' => 4, 'nombre' => 'Pastillas de freno', 'precio' => 30.00],  
    ['id' => 5, 'nombre' => 'Amortiguador', 'precio' => 120.00],  
];  
// Mostrar productos con checkbox  
foreach ($productos as $prod) {  
    echo "<input type='checkbox' name='productos[]' value='{$prod['id']}'>";  
    echo "{$prod['nombre']} - \$ {$prod['precio']}<br>";  
}  
?>  
<br>  
<input type="submit" value="Ver productos seleccionados" />  
</form>  
</body>  
</html>