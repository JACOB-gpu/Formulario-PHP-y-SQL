<?php

require "conn.php";
// Consulta SQL para obtener datos
$sql = "SELECT id, nombre_completo, email, numero_de_telefono, direccion_completa FROM informacion_personal";
$result = $conn->query($sql);
// Verificar si hay resultados y mostrarlos
if ($result->num_rows > 0) {
    echo "<table class='table table-bordered table-striped'>";
    echo "<thead class='thead-dark'><tr><th>id</th><th>nombre_completo</th><th>email</th><th><th>numero_de_telefono</th><th>direccion_completa</th><th>Info</th></tr></thead><tbody>";
    // Recorrer y mostrar cada fila de resultados
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nombre_completo"]. "</td><td>" . $row["email"]. "</td><td>" . $row["numero_de_telefono"]. "</td><td>" . $row["direccion_completa"]. "</td>";
        echo "<td><a href='detalles_usuario.php?id=" . $row["id"] . "' class='btn btn-info'>Ver detalles</a></td></tr>";

    }
    echo "</tbody></table>";
} else {
    echo "<div class='alert alert-warning' role='alert'>0 resultados</div>";
}

// Cerrar la conexión
$conn->close();
?>
