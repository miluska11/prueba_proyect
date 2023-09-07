<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "proyecto_final";

// Crear una conexión utilizando la variable $conn
$conn = new mysqli($servername, $username, $password, $database);

// Verificar si hay errores en la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
$mysqli = new mysqli("localhost", "root", "", "proyecto_final");

if ($mysqli->connect_error) {
    die("Error de conexión a la base de datos: " . $mysqli->connect_error);
}
?>
