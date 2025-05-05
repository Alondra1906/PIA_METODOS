<?php
session_start();

// Usuario y contraseña definidos por ti (puedes cambiarlos aquí)
$usuario_valido = "admin";
$contrasena_valida = "admin123";

// Obtenemos datos del formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Verificación
if ($usuario === $usuario_valido && $contrasena === $contrasena_valida) {
    $_SESSION['admin'] = true;
    header("Location: reporte_selecciones.php");
    exit();
} else {
    header("Location: admin_login.php?error=1");
    exit();
}
