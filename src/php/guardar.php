<?php
require_once 'conexion.php';
require_once 'crud.php';

use Crud\User;

$user = new User();

$id = isset($_POST['id']) ? (int)$_POST['id'] : null;
$nombre = $_POST['nombre'] ?? '';
$correo = $_POST['correo'] ?? '';
$mensaje = $_POST['mensaje'] ?? '';

// Validaciones básicas (puedes mejorar esto)
if (empty($nombre) || empty($correo) || empty($mensaje)) {
    // Podrías redirigir con un mensaje de error o mostrar uno aquí
    die('Por favor completa todos los campos.');
}

if ($id) {
    // Actualizar registro existente
    $resultado = $user->actualizar($id, $nombre, $correo, $mensaje);
} else {
    // Crear nuevo registro
    $resultado = $user->crear($nombre, $correo, $mensaje);
}

if ($resultado) {
    header('Location: ../listar.php');
    exit;
} else {
    echo "Error al guardar los datos.";
}
