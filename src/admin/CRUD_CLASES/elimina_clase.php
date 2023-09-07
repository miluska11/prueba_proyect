<?php
session_start();
require_once "../../config/conexion_bd.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Obtén el ID de la clase desde la URL
    $id = $_GET["id"];

    // Consulta SQL para eliminar la clase por su ID
    $sql = "DELETE FROM cursos WHERE id = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        // Enlaza el parámetro
        $stmt->bind_param("i", $id);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            // La eliminación se realizó con éxito
            $stmt->close();
            $mysqli->close();
            header("Location: clases_read.php"); // Redirige a la página de visualización de clases
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
    echo "No se proporcionó un ID de clase válido.";
}
?>
