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
        background-color: #4CAF50; /* Color verde */
        color: white; /* Texto en blanco */
        padding: 10px 20px; /* Espaciado interior */
        border: none; /* Sin borde */
        text-align: center; /* Alineación del texto al centro */
        text-decoration: none; /* Sin subrayado en el texto */
        display: inline-block;
        font-size: 16px; /* Tamaño de fuente */
        margin: 4px 2px;
        cursor: pointer; /* Cambio de cursor al pasar el mouse */
        border-radius: 4px; /* Bordes redondeados */
    }

    .btn-custom:hover {
        background-color: #45a049; /* Color verde más oscuro al pasar el mouse */
    }
</style>






</head>

<body>
<header class="bg-gray-500 text-white text-center py-2">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <i class="fas fa-bars" id="btn_open"></i>
                <a  class="ml-2">Home</a> 
            </div>

            <div class="flex gap-2 ml-4">
                <a >ADMINISTRADOR</a> 
            </div>
        </div>
    </header>
    <aside class="sidebar">
        <div class="logo flex items-center justify-center">
            <img src="../../../img/logo.jpg" alt="logo">
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
                <h1 class="text-2xl font-medium text-gray-700">Lista de Alumnos</h1>

                <div class="flex gap-1">
                    <a href="./vAdmin.php">
                        <p class="text-blue-500">Home</p>
                    </a>/ <p>Alumno</p>
                </div>
            </div>


            <div class="table-container">
            <a href="agrega_alumno.php" class="btn btn-custom">Agregar Nuevo Alumno</a>

                <h2>Información de alumnos</h2>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Correo</th>
                            <th>Dirección</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Matrícula</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <?php
                        include '../../config/conexion_bd.php'; // Incluye el archivo de conexión a la base de datos

                        // Consulta SQL para obtener los datos de la tabla 'alumnos'
                        $sql = "SELECT * FROM alumnos";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id_estudiante'] . "</td>";
                                echo "<td>" . $row['nombres'] . "</td>";
                                echo "<td>" . $row['apellido'] . "</td>";          
                                echo "<td>" . $row['correo'] . "</td>";
                                echo "<td>" . $row['direccion'] . "</td>";
                                echo "<td>" . $row['fecha_nacimiento'] . "</td>";
                                echo "<td>" . $row['matricula'] . "</td>";
                                echo '<td><a  class="btn btn-custom" href="form_edita.php?id_estudiante=' . $row['id_estudiante'] . '">Editar</a> 
                                | <a href="eliminar_alumno.php?id_estudiante=' . $row['id_estudiante'] . '">Eliminar</a></td>';
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No se encontraron registros de alumnos.</td></tr>";
                        }

                        $conn->close();
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>

</html>