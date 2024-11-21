<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $b_disponible = isset($_POST['b_disponible']) ? 1 : 0;

    $sql = "INSERT INTO Ingredientes (nombre, b_disponible) VALUES ('$nombre', $b_disponible)";
    $conn->query($sql);
}

$ingredientes = $conn->query("SELECT * FROM Ingredientes");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Ingredientes</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-8">Gestionar Ingredientes</h1>

        <form method="POST" class="mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="nombre" placeholder="Nombre del Ingrediente" class="p-2 border rounded">
                <label class="flex items-center">
                    <input type="checkbox" name="b_disponible" class="mr-2">
                    Disponible
                </label>
            </div>
            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Agregar Ingrediente
            </button>
        </form>

        <table class="table-auto w-full bg-white shadow-md rounded">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Disponible</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $ingredientes->fetch_assoc()): ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo $row['num_ingrediente']; ?></td>
                    <td class="border px-4 py-2"><?php echo $row['nombre']; ?></td>
                    <td class="border px-4 py-2"><?php echo $row['b_disponible'] ? 'Sí' : 'No'; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
