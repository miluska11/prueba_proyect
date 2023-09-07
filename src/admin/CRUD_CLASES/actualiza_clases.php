<?php
session_start();
require_once "../../config/conexion_bd.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    // Obtén el ID de la clase desde el formulario
    $id = $_POST["id"];

    // Recoge los datos del formulario
    $nombre_cursos = $_POST["nombre_cursos"];
    $periodo = $_POST["periodo"];
    $maestro_asignado = $_POST["maestro_asignado"];

    // Actualiza los datos en la base de datos
    $sql = "UPDATE cursos SET nombre_cursos = ?, periodo = ?, maestro_asignado = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        // Enlaza los parámetros
        $stmt->bind_param("sssi", $nombre_cursos, $periodo, $maestro_asignado, $id);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            // La actualización se realizó con éxito
            $stmt->close();
            $mysqli->close();
            header("Location: clases_read.php"); // Redirige a la página de visualización de clases
            exit;
        } else {
            echo "Error en la actualización: " . $stmt->error;
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
