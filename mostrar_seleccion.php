<?php  
// Lista de productos  
$productos = [  
    ['id' => 1, 'nombre' => 'Bujía', 'precio' => 15.00],  
    ['id' => 2, 'nombre' => 'Filtro de Aceite', 'precio' => 8.50],  
    ['id' => 3, 'nombre' => 'Correa de Distribución', 'precio' => 45.00],  
    ['id' => 4, 'nombre' => 'Pastillas de freno', 'precio' => 30.00],  
    ['id' => 5, 'nombre' => 'Amortiguador', 'precio' => 120.00],  
];  

// Verifica si hubo selección  
if (isset($_POST['productos'])) {  
    $seleccionados = $_POST['productos'];  
    echo "<h2>Productos seleccionados:</h2>";  
    $total = 0;  
    foreach ($productos as $prod) {  
        if (in_array($prod['id'], $seleccionados)) {  
            echo "{$prod['nombre']} - \$ {$prod['precio']}<br>";  
            $total += $prod['precio'];  
        }  
    }  
    echo "<hr> Total: \$ {$total}";  
} else {  
    echo "No seleccionaste ningún producto.";  
}  
?>  
<br>  
<a href="index.php">Volver al catálogo</a>