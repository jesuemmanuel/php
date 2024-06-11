<?php
$servername = "id22199860_dianap";
$username = "id22199860_diana";
$password = "Hector123@";
$dbname = "school";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
