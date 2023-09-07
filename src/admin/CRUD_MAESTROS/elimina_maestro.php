<?php
session_start();
require_once "../../config/conexion_bd.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id_maestro"])) {
    // Obtén el ID del maestro desde la URL
    $id_maestro = $_GET["id_maestro"];

    // Consulta SQL para eliminar al maestro por su ID
    $sql = "DELETE FROM maestros WHERE id_maestro = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        // Enlaza el parámetro
        $stmt->bind_param("i", $id_maestro);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            // La eliminación se realizó con éxito
            $stmt->close();
            $mysqli->close();
            header("Location: maestro_read.php"); // Redirige a la página de visualización de maestros
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
    echo "No se proporcionó un ID de maestro válido.";
}
?>
