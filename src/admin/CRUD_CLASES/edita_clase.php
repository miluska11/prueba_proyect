<?php
    session_start();
    require_once "../../config/conexion_bd.php";

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        // Obtén el ID de la clase desde la URL
        $id = $_GET["id"];

        // Consulta SQL para obtener los datos de la clase por su ID
        $sql = "SELECT id, nombre_cursos, periodo, maestro_asignado FROM cursos WHERE id = ?";
        $stmt = $mysqli->prepare($sql);

        if ($stmt) {
            // Enlaza el parámetro
            $stmt->bind_param("i", $id);

            // Ejecuta la consulta
            if ($stmt->execute()) {
                // Obtiene los resultados
                $stmt->bind_result($id, $nombre_cursos, $periodo, $maestro_asignado);

                // Muestra el formulario para editar la clase
                if ($stmt->fetch()) {
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
            <form action="actualiza_clases.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        
                        <label for="nombre_cursos">Nombre del Curso:</label>
                        <input type="text" name="nombre_cursos" id="nombre_cursos" value="<?php echo $nombre_cursos; ?>" required>
                        <br>

                        <label for="periodo">Periodo:</label>
                        <input type="text" name="periodo" id="periodo" value="<?php echo $periodo; ?>" required>
                        <br>

                        <label for="maestro_asignado">Maestro Asignado:</label>
                        <select name="maestro_asignado" id="maestro_asignado" required>
                            <!-- PHP para cargar la lista de maestros desde la base de datos -->
                            <?php
                            include "../../config/conexion_bd.php";
                            $sql_maestros = "SELECT id_maestro, nombres, apellidos FROM maestros";
                            $result_maestros = $mysqli->query($sql_maestros);

                            if ($result_maestros->num_rows > 0) {
                                while ($row_maestros = $result_maestros->fetch_assoc()) {
                                    $selected = ($row_maestros['id_maestro'] == $maestro_asignado) ? "selected" : "";
                                    echo '<option value="' . $row_maestros['id_maestro'] . '" ' . $selected . '>' . $row_maestros['nombres'] . ' ' . $row_maestros['apellidos'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <br>

                        <input type="submit" value="Guardar Cambios">
                    </form>
                    <?php
                } else {
                    echo "No se encontraron registros de clases con el ID proporcionado.";
                }

                $stmt->close();
            } else {
                echo "Error en la consulta: " . $stmt->error;
            }
        } else {
            echo "Error en la preparación de la consulta: " . $mysqli->error;
        }
    } else {
        echo "No se proporcionó un ID de clase válido.";
    }

    // Cerrar la conexión
    $mysqli->close();
    ?>
</body>
    
        </body>
</html>
