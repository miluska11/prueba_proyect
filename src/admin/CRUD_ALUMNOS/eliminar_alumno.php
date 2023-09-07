<?php
session_start();
require_once "../../config/conexion_bd.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id_estudiante"])) {
    $id_estudiante = $_GET["id_estudiante"];

    // Query SQL para eliminar al estudiante por su id_estudiante
    $sql = "DELETE FROM alumnos WHERE id_estudiante = ?";

    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        // Enlaza el parámetro
        $stmt->bind_param("i", $id_estudiante);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            // La eliminación se realizó con éxito
            $stmt->close();
            $mysqli->close();
            header("Location: alumnos_read.php");
            exit;
        } else {
            echo "Error en la eliminación: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $mysqli->error;
    }

    $mysqli->close();
} else {
    // Redirecciona a la página de lectura de alumnos si no se proporciona un ID válido
    header("Location: alumnos_read.php");
    exit;
}
?>
