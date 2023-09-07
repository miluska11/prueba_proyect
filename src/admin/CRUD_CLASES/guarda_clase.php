<?php
session_start();
require_once "../../config/conexion_bd.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $nombre_cursos = $_POST["nombre_cursos"];
    $periodo = $_POST["periodo"];
    $maestro_asignado = $_POST["maestro_asignado"];

    // Consulta SQL para insertar una nueva clase en la tabla 'cursos'
    $sql = "INSERT INTO cursos (nombre_cursos, periodo, maestro_asignado) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        // Enlaza los parámetros
        $stmt->bind_param("sss", $nombre_cursos, $periodo, $maestro_asignado);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            // La inserción se realizó con éxito
            $stmt->close();
            $mysqli->close();
            header("Location: clases_read.php"); // Redirige a la página de visualización de clases
            exit;
        } else {
            echo "Error en la inserción: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $mysqli->error;
    }
}

// Cerrar la conexión
$mysqli->close();
?>
