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

        .btn-custom {
            background-color: #4CAF50;
            /* Color verde */
            color: white;
            /* Texto en blanco */
            padding: 10px 20px;
            /* Espaciado interior */
            border: none;
            /* Sin borde */
            text-align: center;
            /* Alineación del texto al centro */
            text-decoration: none;
            /* Sin subrayado en el texto */
            display: inline-block;
            font-size: 16px;
            /* Tamaño de fuente */
            margin: 4px 2px;
            cursor: pointer;
            /* Cambio de cursor al pasar el mouse */
            border-radius: 4px;
            /* Bordes redondeados */
        }

        .btn-custom:hover {
            background-color: #45a049;
            /* Color verde más oscuro al pasar el mouse */
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
                <a href="../CRUD_MAESTROS/maestro_read.php">Maestros</a>
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
                <h1 class="text-2xl font-medium text-gray-700">Lista de clases</h1>

                <div class="flex gap-1">
                    <a href="./vAdmin.php">
                        <p class="text-blue-500">Home</p>
                    </a>/ <p>Alumno</p>
                </div>
            </div>


            <div class="table-container">
                <a href="agregar_clase.php" class="btn btn-custom">Agregar Nueva clase</a>

                <?php
                // Conexión a la base de datos (reemplaza con tus propios datos)
                $mysqli = new mysqli("localhost", "root", "", "proyecto_final");

                // Verificar la conexión
                if ($mysqli->connect_error) {
                    die("Error en la conexión a la base de datos: " . $mysqli->connect_error);
                }

                // Consulta SQL para obtener los datos de la tabla 'cursos'
                $sql = "SELECT id, nombre_cursos, periodo, maestro_asignado FROM cursos";
                $result = $mysqli->query($sql);

                // Comprobar si se obtuvieron resultados
                if ($result->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Nombre del Curso</th><th>Periodo</th><th>Maestro Asignado</th><th>Acciones</th></tr>";
                  
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nombre_cursos'] . "</td>";
                        echo "<td>" . $row['periodo'] . "</td>";
                        echo "<td>" . $row['maestro_asignado'] . "</td>";
                        echo '<td><a class="btn btn-custom" href="edita_clase.php?id=' . $row['id'] . '">Editar</a> 
                        | <a href="elimina_clase.php?id=' . $row['id'] . '">Eliminar</a></td>';
               
                        echo "</tr>";
                    }

                    echo "</table>";
                } else {
                    echo "No se encontraron registros de cursos.";
                }

                // Cerrar la conexión
                $mysqli->close();
                ?>

            </div>

</body>
<script src="https://cdn.tailwindcss.com"></script>

</html>