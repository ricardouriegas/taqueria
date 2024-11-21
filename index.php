<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taquería - Sistema de Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-8">Sistema de Gestión - Taquería</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="ingredientes.php" class="block p-4 bg-white shadow-md rounded-lg hover:bg-gray-50">
                <h2 class="text-xl font-bold">Gestionar Ingredientes</h2>
                <p>Agregar, editar o eliminar ingredientes.</p>
            </a>
            <a href="productos.php" class="block p-4 bg-white shadow-md rounded-lg hover:bg-gray-50">
                <h2 class="text-xl font-bold">Gestionar Productos</h2>
                <p>Configurar tacos y precios.</p>
            </a>
            <a href="usuarios.php" class="block p-4 bg-white shadow-md rounded-lg hover:bg-gray-50">
                <h2 class="text-xl font-bold">Gestionar Usuarios</h2>
                <p>Administrar los usuarios y roles del sistema.</p>
            </a>
        </div>
    </div>
</body>
</html>
