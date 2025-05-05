<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "Alondra321", "catalogo");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Insertar usuarios con contraseñas seguras
$usuarios = [
    ['Juan Pérez', 'juan@ejemplo.com', '12345'],
    ['María López', 'maria@ejemplo.com', '67890']
];

foreach ($usuarios as $usuario) {
    $nombre = $usuario[0];
    $correo = $usuario[1];
    $contrasena = password_hash($usuario[2], PASSWORD_DEFAULT); // Encriptar la contraseña

    $query = $conexion->prepare("INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)");
    $query->bind_param("sss", $nombre, $correo, $contrasena);
    $query->execute();
}

echo "Usuarios insertados con éxito.";
?>
