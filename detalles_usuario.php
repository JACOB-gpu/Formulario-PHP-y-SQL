<?php
require_once ("./conn.php");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del usuario desde la URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // Consulta SQL para obtener los detalles del usuario
    $sql = "SELECT id, nombre_completo, email, numero_de_telefono, direccion_completa FROM informacion_personal WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<div class='container mt-5'>";
            echo "<h2 class='mb-4'>Detalles del Usuario</h2>";
            echo "<p><strong>id:</strong> " . $row['id'] . "</p>";
            echo "<p><strong>nombre_completo:</strong> " . $row['nombre_completo'] . "</p>";
            echo "<p><strong>email:</strong> " . $row['email'] . "</p>";
            echo "<p><strong>numero_de_telefono:</strong> " . $row['numero_de_telefono'] . "</p>";
            echo "<p><strong>direccion_completa:</strong> " . $row['direccion_completa'] . "</p>";
            echo "<a href='index.php' class='btn btn-primary'>Volver a la lista</a>";
            echo "</div>";
        } else {
            echo "<div class='alert alert-warning' role='alert'>Usuario no encontrado</div>";
        }

        $stmt->close();
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error en la consulta</div>";
    }
} else {
    echo "<div class='alert alert-warning' role='alert'>ID de usuario no válido</div>";
}

// Cerrar la conexión
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Usuario</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- Incluir Bootstrap JS y dependencias -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
