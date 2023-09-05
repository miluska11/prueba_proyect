<?php
session_start();
require_once "../../config/conexion_bd.php";
$id_estudiante = $_POST['id_estudiante']; // Reemplaza 'id_estudiante' por el nombre correcto de tu campo ID

$nombres = $_POST["nombres"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$password = $_POST["contrasena"];
$direccion = $_POST['direccion'];
$matricula = $_POST["matricula"];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

if ($mysqli) {
    $query_estudiantes = "UPDATE alumnos SET ";
$params_estudiantes = array();

if (!empty($nombres)) {
    $query_estudiantes .= "nombres = ?, ";
    $params_estudiantes[] = $nombres;
}

if (!empty($apellido)) {
    $query_estudiantes .= "apellido = ?, ";
    $params_estudiantes[] = $apellido;
}
if (!empty($correo)) {
    $query_estudiantes .= "correo = ?, ";
    $params_estudiantes[] = $correo;
}
if (!empty($contrasena)) {
    $query_estudiantes .= "contrasena = ?, ";
    $params_estudiantes[] = password_hash($contrasena, PASSWORD_DEFAULT);
}
if (!empty($direccion)) {
    $query_estudiantes .= "direccion = ?, ";
    $params_estudiantes[] = $direccion;
}
if (!empty($matricula)) {
    $query_estudiantes .= "matricula = ?, ";
    $params_estudiantes[] = $matricula;
}


if (!empty($fecha_nacimiento)) {
    $query_estudiantes .= "fecha_nacimiento = ?, ";
    $params_estudiantes[] = $fecha_nacimiento;
}

// Continúa agregando las demás columnas que deseas actualizar de la misma manera

// Asegúrate de tener al menos una columna para actualizar antes de continuar
if (count($params_estudiantes) > 0) {
    // Quita la coma adicional al final de la consulta
    $query_estudiantes = rtrim($query_estudiantes, ', ');

    // Agrega la cláusula WHERE para especificar el estudiante que deseas actualizar
    $query_estudiantes .= " WHERE id_estudiante = ?"; // Cambia 'id_estudiante' al nombre de la columna adecuado
    $params_estudiantes[] = $id_estudiante; // Asegúrate de definir $id_estudiante antes

    // Prepara la consulta y realiza la actualización
    $stmt_estudiantes = $mysqli->prepare($query_estudiantes);
    $types_estudiantes = str_repeat("s", count($params_estudiantes));
    $stmt_estudiantes->bind_param($types_estudiantes, ...$params_estudiantes);

    if ($stmt_estudiantes->execute()) {
        // La actualización se realizó con éxito
        $stmt_estudiantes->close();
        $mysqli->close();
        header("Location: alumnos_read.php");
        exit;
    } else {
        echo "Error en la actualización: " . $stmt_estudiantes->error;
    }

    $stmt_estudiantes->close();
} else {
    echo "No se proporcionaron datos para actualizar.";
}
}