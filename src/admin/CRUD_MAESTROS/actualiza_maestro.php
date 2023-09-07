<?php
session_start();
require_once "../../config/conexion_bd.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $id_maestro = $_POST["id_maestro"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $direccion = $_POST["direccion"];
    $fecha_naci = $_POST["fecha_naci"];
    $clase_asignada = $_POST["clase_asignada"]; // Asegúrate de que este campo coincida con el nombre correcto

    // Consulta SQL para actualizar los datos del maestro
    $sql = "UPDATE maestros SET nombres = ?, apellidos = ?, correo = ?, contrasena = ?, direccion = ?, fecha_naci = ?, clase_asignada = ? WHERE id_maestro = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        // Enlaza los parámetros
        $stmt->bind_param("sssssssi", $nombres, $apellidos, $correo, $contrasena, $direccion, $fecha_naci, $clase_asignada, $id_maestro);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            // La actualización se realizó con éxito
            $stmt->close();
            $mysqli->close();
            header("Location: maestro_read.php"); // Redirige a la página de visualización de maestros
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
    echo "No se recibieron datos del formulario.";
}
?>
