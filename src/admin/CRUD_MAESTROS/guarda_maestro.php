<?php
session_start();
require_once "../../config/conexion_bd.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $direccion = $_POST["direccion"];
    $fecha_naci = $_POST["fecha_naci"];
    $clase_asignada = $_POST["clase_asignada"];

    // Hash de la contraseña (puedes ajustar esto según tu configuración de seguridad)
    //$contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

    // Consulta SQL para insertar un nuevo maestro en la tabla 'maestros'
    $sql = "INSERT INTO maestros (nombres, apellidos, correo, contrasena, direccion, fecha_naci, clase_asignada) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        // Enlaza los parámetros
        $stmt->bind_param("ssssssi", $nombres, $apellidos, $correo, $contrasena, $direccion, $fecha_naci, $clase_asignada);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            // La inserción se realizó con éxito
            $stmt->close();
            $mysqli->close();
            header("Location: maestro_read.php"); // Redirige a la lista de maestros u otra página según tu estructura
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
