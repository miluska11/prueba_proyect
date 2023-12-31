<?php
session_start();
require_once "../../config/conexion_bd.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén el ID del estudiante del formulario anterior
    $id_estudiante = $_POST['id_estudiante'];

    // Recoge los datos del formulario
    $nombres = $_POST["nombres"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $direccion = $_POST['direccion'];
    $matricula = $_POST["matricula"];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    // Actualiza los datos en la base de datos
    $sql = "UPDATE alumnos SET nombres = ?, apellido = ?, correo = ?, contrasena = ?, direccion = ?, matricula = ?, fecha_nacimiento = ? WHERE id_estudiante = ?";

    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        // Enlaza los parámetros
        $stmt->bind_param("sssssssi", $nombres, $apellido, $correo, $contrasena, $direccion, $matricula, $fecha_nacimiento, $id_estudiante);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            // La actualización se realizó con éxito
            $stmt->close();
            $mysqli->close();
            header("Location: alumnos_read.php");
            exit;
        } else {
            echo "Error en la actualización: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $mysqli->error;
    }

    $mysqli->close();
}
?>
