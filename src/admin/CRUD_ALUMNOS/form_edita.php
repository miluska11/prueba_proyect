<?php
include "../../config/conexion_bd.php"; // Asegúrate de que la conexión esté incluida y configurada en conexion_bd.php

$id_estudiante = $_GET['id_estudiante'];

if (!empty($id_estudiante)) {
    // Realiza la consulta SQL y obtén los datos del estudiante
    $sql = "SELECT * FROM alumnos WHERE id_estudiante = $id_estudiante";
    $query = mysqli_query($conn, $sql);

    if ($query && mysqli_num_rows($query) > 0) {
        // Obtenemos los datos del estudiante
        $resultado = mysqli_fetch_assoc($query);
    } else {
        echo "No se encontraron resultados para el estudiante con ID $id_estudiante";
    }
} else {
    echo "ID de estudiante no proporcionado en la URL.";
}
// Cierra la conexión
mysqli_close($conn);
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
                <h1 class="text-2xl font-medium text-gray-700">Lista de Alumnos</h1>

                <div class="flex gap-1">
                    <a href="./vAdmin.php">
                        <p class="text-blue-500">Home</p>
                    </a>/ <p>Alumno</p>
                </div>
            </div>
 <form class="flex flex-col gap-4 p-3 pl-6" action="alumno_edit.php" method="post">
                       
                    <div>
                            <strong>
                                <p>Nombre(s)</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md hover:bg-slate-200 focus:outline-0" type="text" name="nombres" value="<?php echo $resultado['nombres'] ?>">
                            </div>
                        </div>
                        <div>
                            <strong>
                                <p>Apellidos</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md hover:bg-slate-200 focus:outline-0" type="text" name="apellido" value="<?php echo $resultado['apellido'] ?>">
                            </div>
                        </div>
                        <div>
                            <strong>
                                <p>Correo Electronico</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md hover:bg-slate-200 focus:outline-0" type="email" name="correo" value="<?php echo $resultado['correo'] ?>">
                            </div>
                        </div>
                        <div>
                            <strong>
                                <p>Direccion</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md hover:bg-slate-200 focus:outline-0" type="text" name="direccion" value="<?php echo $resultado['direccion'] ?>">
                            </div>
                        </div>
                        <div>
                            <strong>
                                <p>Matricula</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md bg-slate-200 hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md bg-slate-200 hover:bg-slate-200 focus:outline-0" type="text" name="matricula" value="<?php echo $resultado['matricula'] ?>">
                            </div>
                        </div>
                        
                        <div>
                            <strong>
                                <p>Contraseña Ingresa para cambiar la contraseña</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md hover:bg-slate-200 focus:outline-0" type="password" name="contrasena" placeholder="Para modificar ingresa una nueva contraseña">
                            </div>
                        </div>
                   
                 
                        <div>
                            <strong>
                                <p>Fecha de nacimiento</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px]  rounded-l-md hover:bg-slate-200 focus:outline-0" type="date" name="fecha_nacimiento" value="<?php echo $resultado['fecha_nacimiento'] ?>">
                            </div>
                        </div>

                        <button type="submit" class="w-[170px] bg-blue-500 text-white px-4 py-[6px] rounded-md right-5  hover:bg-blue-600 hover:shadow-custom hover:shadow-zinc-800">Guardar Cambios</button>
                    </form>

          
            </div>
        </div>
    </div>
    </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>

</html>