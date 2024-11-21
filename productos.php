<?php
include 'db.php';

// Insertar producto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_producto = $_POST['nombre_producto'];
    $precio = $_POST['precio'];

    $sql = "INSERT INTO Productos (nombre_producto, precio) VALUES ('$nombre_producto', $precio)";
    $conn->query($sql);
}

// Obtener productos
$productos = $conn->query("SELECT * FROM Productos");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-8">Gestionar Productos</h1>

        <!-- Formulario para agregar producto -->
        <form method="POST" class="mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="nombre_producto" placeholder="Nombre del Producto" class="p-2 border rounded" required>
                <input type="number" step="0.01" name="precio" placeholder="Precio del Producto" class="p-2 border rounded" required>
            </div>
            <button type="submit" class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Agregar Producto
            </button>
        </form>

        <!-- Tabla de productos -->
        <table class="table-auto w-full bg-white shadow-md rounded">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $productos->fetch_assoc()): ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo $row['id_producto']; ?></td>
                    <td class="border px-4 py-2"><?php echo $row['nombre_producto']; ?></td>
                    <td class="border px-4 py-2">$<?php echo number_format($row['precio'], 2); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
