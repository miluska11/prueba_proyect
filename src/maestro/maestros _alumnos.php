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
        /* Estilos CSS personalizados aquí... */
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
    <header class="bg-gray-500 text-white text-center py-2">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <i class="fas fa-bars" id="btn_open"></i>
                <a href="index.html" class="ml-2">Home</a> <!-- Enlace a la página de inicio (Home) -->
            </div>

            <div class="flex gap-2 ml-4">
                <a href="administracion.html">maestro maestro</a> <!-- Enlace a la página de administración -->
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
                <h4>Maestro</h4>
            </li>
            <div class="text-white font-medium flex">
                <p>maestro maestro</p>
            </div>
            <li class="separator-horizontal"></li>
            <li>
                <h4>MENU MAESTROS</h4>
            </li>
           
                <span class="material-symbols-outlined">ambient_screen</span>
                <a href="#">Alumnos</a>
            </li>
           
        </ul>
    </aside>
    <div class="main-content" style="margin-top: 10px;">
    <div class="p-5 h-[80%] flex flex-col gap-6 bg-white rounded-md shadow-md">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-medium text-gray-700">Dashboard</h1>
        </div>
        <div class="p-4">
            <p class="text-base text-gray-600">
                Bienvenido <br> Selecciona la acción que quieras realizar en las pestañas del menú de la izquierda.
            </p>
        </div>
    </div>
</div>

</body>
<script src="https://cdn.tailwindcss.com"></script>

</html>
