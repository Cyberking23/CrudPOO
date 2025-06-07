<?php
require_once './php/conexion.php';
require_once './php/crud.php';

use Crud\User;

$user = new User();
$datos = isset($_GET['id']) ? $user->getById((int)$_GET['id']) : null;

if (!$datos) {
    header('Location: listar.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Formulario</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Formulario</h1>

    <form action="./php/guardar.php" method="POST" class="space-y-4">
      <!-- Campo oculto para el id, solo si estamos editando -->
      <input type="hidden" name="id" value="<?php echo $datos['id']; ?>">

      <div>
        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
        <input
          type="text"
          name="nombre"
          id="nombre"
          value="<?php echo htmlspecialchars($datos['nombre']); ?>"
          required
          class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>

      <div>
        <label for="correo" class="block text-sm font-medium text-gray-700">Correo</label>
        <input
          type="email"
          name="correo"
          id="correo"
          value="<?php echo htmlspecialchars($datos['correo']); ?>"
          required
          class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>

      <div>
        <label for="mensaje" class="block text-sm font-medium text-gray-700">Mensaje</label>
        <textarea
          name="mensaje"
          id="mensaje"
          rows="4"
          required
          class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        ><?php echo htmlspecialchars($datos['mensaje']); ?></textarea>
      </div>

      <div class="text-center">
        <button
          type="submit"
          class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md text-sm font-medium"
        >
          Guardar
        </button>
      </div>
    </form>

    <div class="text-center mt-4">
      <a href="listar.php" class="text-blue-600 hover:underline text-sm">← Volver al listado</a>
    </div>
  </div>

</body>
</html>
