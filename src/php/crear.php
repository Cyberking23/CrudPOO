<?php
require_once 'conexion.php';
require_once 'crud.php';

use Crud\User;

$user = new User(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $mensaje = $_POST['mensaje'] ?? '';

    if ($user->crear($nombre, $correo, $mensaje)) {
        header('Location: ../listar.php');
        exit;
    } else {
        echo "Error al guardar los datos.";
    }
}

?>