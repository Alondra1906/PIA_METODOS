<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$conexion = new mysqli("localhost", "root", "Alondra321", "catalogo");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "
SELECT 
    u.id AS usuario_id,
    u.nombre AS nombre_usuario,
    p.nombre AS nombre_producto,
    s.cantidad,
    p.precio,
    (s.cantidad * p.precio) AS total_producto
FROM seleccion s
JOIN productos p ON s.producto_id = p.id
JOIN usuarios u ON s.usuario_id = u.id
ORDER BY u.nombre, p.nombre
";

$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Selecciones</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f4f4;
            padding: 20px;
            color: #333;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #3498db;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .total-usuario {
            background-color: #d1ecf1;
            font-weight: bold;
        }
        .volver {
            display: block;
            text-align: center;
            margin-top: 30px;
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }
        .volver:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2>Reporte de Productos Seleccionados por Usuarios</h2>

<table>
    <tr>
        <th>Usuario</th>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio Unitario</th>
        <th>Total por Producto</th>
    </tr>

    <?php
    if ($resultado->num_rows > 0) {
        $usuario_actual = "";
        $total_usuario = 0;

        while ($fila = $resultado->fetch_assoc()) {
            if ($usuario_actual !== "" && $usuario_actual !== $fila['nombre_usuario']) {
                // Mostrar total del usuario anterior
                echo "<tr class='total-usuario'>
                        <td colspan='4'>Total de {$usuario_actual}</td>
                        <td>$" . number_format($total_usuario, 2) . "</td>
                    </tr>";
                $total_usuario = 0;
            }

            $usuario_actual = $fila['nombre_usuario'];
            $total_usuario += $fila['total_producto'];

            echo "<tr>
                <td>{$fila['nombre_usuario']}</td>
                <td>{$fila['nombre_producto']}</td>
                <td>{$fila['cantidad']}</td>
                <td>$" . number_format($fila['precio'], 2) . "</td>
                <td>$" . number_format($fila['total_producto'], 2) . "</td>
            </tr>";
        }

        // Mostrar el total del último usuario
        echo "<tr class='total-usuario'>
                <td colspan='4'>Total de {$usuario_actual}</td>
                <td>$" . number_format($total_usuario, 2) . "</td>
            </tr>";

    } else {
        echo "<tr><td colspan='5'>No hay selecciones registradas.</td></tr>";
    }
    $conexion->close();
    ?>
</table>

<a href="admin_logout.php" class="volver">Cerrar sesión</a>

</body>
</html>
