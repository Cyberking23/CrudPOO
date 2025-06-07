<?php
require_once './php/conexion.php';
require_once './php/crud.php';

use Crud\User;

$user = new User();
$datos = $user->leer();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado de Datos</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

  <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-5xl">
    <div class="flex justify-between items-center mb-4">
      <h1 class="text-xl font-bold text-gray-800">Listado de datos</h1>
      <a href="crear.php" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm font-medium">
        Crear nuevo
      </a>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full table-auto border-collapse">
        <thead class="bg-gray-200 text-gray-700 text-sm">
          <tr>
            <th class="px-4 py-2 text-left">#</th>
            <th class="px-4 py-2 text-left">Nombre</th>
            <th class="px-4 py-2 text-left">Correo</th>
            <th class="px-4 py-2 text-left">Mensaje</th>
            <th class="px-4 py-2 text-left">Creado en</th>
            <th class="px-4 py-2 text-left">Acciones</th>
          </tr>
        </thead>
        <tbody class="text-sm text-gray-700">
          <?php if (!empty($datos)): ?>
            <?php foreach ($datos as $dato): ?>
              <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2"><?php echo $dato['id']; ?></td>
                <td class="px-4 py-2"><?php echo htmlspecialchars($dato['nombre']); ?></td>
                <td class="px-4 py-2"><?php echo htmlspecialchars($dato['correo']); ?></td>
                <td class="px-4 py-2"><?php echo htmlspecialchars($dato['mensaje']); ?></td>
                <td class="px-4 py-2"><?php echo htmlspecialchars($dato['creado_en']); ?></td>
                <td class="px-4 py-2 flex space-x-2">
                  <a href="editar.php?id=<?php echo $dato['id']; ?>"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm font-medium">
                    Editar
                  </a>
                  <form action="./php/eliminar.php" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este dato?')" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $dato['id']; ?>">
                    <button type="submit"
                      class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm font-medium">
                      Eliminar
                    </button>
                  </form>
                </td>

              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="6" class="px-4 py-4 text-center text-gray-500">No hay datos registrados.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

</body>

</html>