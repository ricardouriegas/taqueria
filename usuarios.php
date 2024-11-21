<?php
include 'db.php';

// Insertar usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar contraseña
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $rol = $_POST['rol'];

    $sql = "INSERT INTO Usuarios (username, password, nombre, apellido, rol) 
            VALUES ('$username', '$password', '$nombre', '$apellido', '$rol')";
    $conn->query($sql);
}

// Obtener usuarios
$usuarios = $conn->query("SELECT * FROM Usuarios");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-8">Gestionar Usuarios</h1>

        <!-- Formulario para agregar usuario -->
        <form method="POST" class="mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="username" placeholder="Username" class="p-2 border rounded" required>
                <input type="password" name="password" placeholder="Contraseña" class="p-2 border rounded" required>
                <input type="text" name="nombre" placeholder="Nombre" class="p-2 border rounded" required>
                <input type="text" name="apellido" placeholder="Apellido" class="p-2 border rounded" required>
                <select name="rol" class="p-2 border rounded" required>
                    <option value="" disabled selected>Selecciona un rol</option>
                    <option value="admin">Administrador</option>
                    <option value="mesero">Mesero</option>
                    <option value="cajero">Cajero</option>
                    <option value="cocinero">Cocinero</option>
                </select>
            </div>
            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Agregar Usuario
            </button>
        </form>

        <!-- Tabla de usuarios -->
        <table class="table-auto w-full bg-white shadow-md rounded">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">Username</th>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Apellido</th>
                    <th class="px-4 py-2">Rol</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $usuarios->fetch_assoc()): ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo $row['username']; ?></td>
                    <td class="border px-4 py-2"><?php echo $row['nombre']; ?></td>
                    <td class="border px-4 py-2"><?php echo $row['apellido']; ?></td>
                    <td class="border px-4 py-2"><?php echo ucfirst($row['rol']); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
