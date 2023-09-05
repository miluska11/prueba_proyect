<?php
require '../config/conexion_bd.php';

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        //casos de registros
       // case 'editar_registro':
         //   editar_registro();
           // break;

        

        case 'acceso_username';
            acceso_username();
            break;



    }
    

}
function acceso_username(){
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    session_start();
    $conexion = mysqli_connect("localhost", "root", "", "proyecto_final");
    // Verificar en la tabla de alumnos
    $consulta_alumnos = "SELECT * FROM alumnos WHERE correo='$correo' AND contrasena='$contrasena'";
    $resultado_alumnos = mysqli_query($conexion, $consulta_alumnos);
    $filas_alumnos = mysqli_fetch_array($resultado_alumnos);

    // Verificar en la tabla de maestros
    $consulta_maestros = "SELECT * FROM maestros WHERE correo='$correo' AND contrasena='$contrasena'";
    $resultado_maestros = mysqli_query($conexion, $consulta_maestros);
    $filas_maestros = mysqli_fetch_array($resultado_maestros);

    // Verificar en la tabla de administrador
    $consulta_administrador = "SELECT * FROM administrador WHERE correo='$correo' AND contrasena='$contrasena'";
    $resultado_administrador = mysqli_query($conexion, $consulta_administrador);
    $filas_administrador = mysqli_fetch_array($resultado_administrador);

    if (!empty($filas_alumnos)) { // Si es un alumno
        header('Location: ../alumno/CLASES/alumnos.php');
    } elseif (!empty($filas_maestros)) { // Si es un maestro
        header('Location: ../maestro/maestros.php');
    } elseif (!empty($filas_administrador)) { // Si es un administrador
        header('Location: ../admin/CRUD_ALUMNOS/admin_vista.php');
    } else {
        echo '<script>alert("Correo no existe.");</script>';
        // Redireccionar a la página de inicio de sesión después de mostrar la alerta
        echo '<script>setTimeout(function() { window.location.href = "index.php"; }, 1);</script>';
       
        // Destruir la sesión
        session_destroy();
    }
}    