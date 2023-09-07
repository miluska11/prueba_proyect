<?php
session_start();
require_once "../../config/conexion_bd.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id_maestro"])) {
    // Obtiene el ID del maestro desde la URL
    $id_maestro = $_GET["id_maestro"];

    // Consulta SQL para obtener los datos del maestro
    $sql = "SELECT * FROM maestros WHERE id_maestro = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        // Enlaza el parámetro
        $stmt->bind_param("i", $id_maestro);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                // Obtiene los datos del maestro
                $row = $result->fetch_assoc();

                $nombres = $row["nombres"];
                $apellidos = $row["apellidos"];
                $correo = $row["correo"];
                $contrasena = $row["contrasena"]; // La contraseña se mostrará en un campo separado para modificarla opcionalmente
                $direccion = $row["direccion"];
                $fecha_naci = $row["fecha_naci"];
                $clase_asignada = $row["clase_asignada"];
            } else {
                echo "No se encontró el maestro.";
                exit;
            }

            $stmt->close();
        } else {
            echo "Error en la consulta: " . $stmt->error;
            exit;
        }
    } else {
        echo "Error en la preparación de la consulta: " . $mysqli->error;
        exit;
    }
} else {
    echo "ID de maestro no proporcionado.";
    exit;
}

// La siguiente parte del código muestra un formulario con los datos del maestro para permitir la edición.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universidad XYZ</title>
    <!-- Linking Google font link for icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <!-- Link your external CSS file -->
    <link rel="stylesheet" href="index.css">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Estilos CSS personalizados aquí */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #34393f;
            color: white;
            text-align: center;
            padding: 10px;
        }

        .icon__menu {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar {
            width: 20%;
            background-color: #34393f;
            color: white;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        .logo {
            text-align: center;
            padding: 20px 0;
        }

        .logo img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }

        .links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .links li {
            padding: 10px 0;
            border-top: 1px solid #51575e;
            border-bottom: 1px solid #51575e;
        }

        .links h4 {
            margin: 0;
            padding: 10px;
        }

        .links a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        .main-content {
            margin-left: 20%;
            padding: 20px;
        }

        .main-content h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .table-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
     
        /* Estilos para el formulario */
        form {
            width: 1000px; /* Ancho del formulario */
            margin: 0 auto; /* Centrar horizontalmente */
            padding: 20px; /* Espacio interno */
            border: 2px solid #ccc; /* Borde con color */
            border-radius: 5px; /* Bordes redondeados */
        }

        /* Estilos para los campos de entrada */
        input[type="text"], input[type="password"] {
            width: 100%; /* Ancho del campo de entrada al 100% */
            padding: 10px; /* Espacio interno */
            margin-bottom: 10px; /* Margen inferior */
            border: 1px solid #ccc; /* Borde con color */
            border-radius: 5px; /* Bordes redondeados */
        }

        /* Estilos para el botón de envío */
        input[type="submit"] {
            background-color: #3498db; /* Color de fondo */
            color: #fff; /* Color del texto */
            border: none; /* Sin borde */
            padding: 10px 20px; /* Espacio interno */
            border-radius: 5px; /* Bordes redondeados */
            cursor: pointer; /* Cambiar el cursor al pasar sobre el botón */
        }

        /* Estilos para el botón de envío al pasar el cursor */
        input[type="submit"]:hover {
            background-color: #2980b9; /* Cambiar el color de fondo al pasar el cursor */
        }
    </style>
    
</head>
<body>
    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
            <h1 class="li">Home</h1>
            <div class="flex gap-2 justify-end">
                <p>Administrador</p>
    </header>
    <aside class="sidebar">
        <div class="logo">
            <img src="../../../img/logo.jpg" alt="logo">
            <h2 class="lu">Universidad</h2>
        </div>
        <ul class="links">
            <li class="separator-horizontal"></li>
            <li>
                <h4>Admin</h4>
            </li>
            <div class="text-white font-medium flex">
                <p>Administrador</p>
            </div>
            <li class="separator-horizontal"></li>
            <li>
                <h4>MENU ADMINISTRATIVO</h4>
            </li>
            <li>
                <span class="material-symbols-outlined">person</span>
                <a href="#">Personas</a>
            </li>
            <li>
                <span class="material-symbols-outlined">group</span>
                <a href="#">Maestros</a>
            </li>
            <li>
                <span class="material-symbols-outlined">ambient_screen</span>
                <a href="#">Alumnos</a>
            </li>
            <li>
                <span class="material-symbols-outlined">pacemaker</span>
                <a href="#">Clases</a>
            </li>
        </ul>
    </aside>
    <div class="main-content">
        <div class="p-5 h-[80%] flex flex-col gap-6 mt-[70px]">
            <div class="flex justify-between">
        

                <div class="flex gap-1">
                    <a href="./vAdmin.php">
                        <p class="text-blue-500">Home</p>
                    </a>/ <p>Alumno</p>
                </div>
            </div>
    <h1>Editar Maestro</h1>
    <form action="actualiza_maestro.php" method="POST">
        <input type="hidden" name="id_maestro" value="<?php echo $id_maestro; ?>">
        <label for="nombres">Nombres:</label>
        <input type="text" name="nombres" value="<?php echo $nombres; ?>" required><br>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" value="<?php echo $apellidos; ?>" required><br>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" value="<?php echo $correo; ?>" required><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena"><br>
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" value="<?php echo $direccion; ?>"><br>
        <label for="fecha_naci">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_naci" value="<?php echo $fecha_naci; ?>"><br>
        <label for="clase_asignada">Clase Asignada:</label>
        <!-- Aquí debes mostrar la lista de cursos disponibles y permitir la selección -->
        <!-- Puedes usar un campo de selección (select) con opciones generadas desde la base de datos -->
        <!-- Ejemplo: -->
        <!-- <select name="clase_asignada">
            <option value="1">Curso 1</option>
            <option value="2">Curso 2</option>
            <option value="3">Curso 3</option>
        </select> -->
        <input type="text" name="clase_asignada" value="<?php echo $clase_asignada; ?>"><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>
