<?php
require_once 'conexion.php';
require_once 'crud.php';

use Crud\User;

$user = new User();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $user->eliminar($id);
    header('Location: ../listar.php');
    exit();
}