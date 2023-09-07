<?php
session_start();
require_once "../../config/conexion_bd.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $nombres = $_POST["nombres"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $direccion = $_POST['direccion'];
    $matricula = $_POST["matricula"];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    // Query SQL para insertar un nuevo alumno en la tabla 'alumnos'
    $sql = "INSERT INTO alumnos (nombres, apellido, correo, contrasena, direccion, matricula, fecha_nacimiento) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        // Enlaza los parámetros
        $stmt->bind_param("sssssss", $nombres, $apellido, $correo, $contrasena, $direccion, $matricula, $fecha_nacimiento);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            // La inserción se realizó con éxito
            $stmt->close();
            $mysqli->close();
            header("Location: alumnos_read.php");
            exit;
        } else {
            echo "Error en la inserción: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $mysqli->error;
    }

    $mysqli->close();
}
?>
