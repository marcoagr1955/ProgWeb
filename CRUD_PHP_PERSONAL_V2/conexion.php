<?php
$servername = 'localhost';
$username = 'root';
$password = 'aaaaaaaa';
$database = 'progweb';

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}
?>
