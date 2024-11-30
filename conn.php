<?php
// Datos de la conexión
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datos_personales";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
