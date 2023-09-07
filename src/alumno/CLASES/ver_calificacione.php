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
                <h4>Alumno</h4>
            </li>
            <div class="text-white font-medium flex">
                <p>karolina Garcia</p>
            </div>
            <li class="separator-horizontal"></li>
            <li>
                <h4>MENU ALUMNOS</h4>
            </li>
           
                <span class="material-symbols-outlined">ambient_screen</span>
                <a href="#">Ver Calificaciones</a>
            </li>
           
            <li>
           
           <span class="material-symbols-outlined">ambient_screen</span>
           <a href="#">Administra tus clases</a>
       </li>
      
        </ul>
    </aside>
    <div class="main-content" style="margin-top: 10px; ">
        <div class="p-5 h-[80%] flex flex-col gap-6 ">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-medium text-gray-700">Editar datos de perfil</h1>
                    </div>
                </div>
                <div class="bg-white shadow-sm shadow-gray-400 w-[100%] rounded-sm  flex flex-col justify-center gap-1">
                    <div class="flex items-center p-3 pl-6">
                        <h2>Informacion de Usuario</h2>
                    </div>
                    <hr>
                    <form class="flex flex-col gap-4 p-3 pl-6" action="alumno_edit.php" method="post">
                       
                    <div>
                            <strong>
                                <p>Matricula</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md hover:bg-slate-200 focus:outline-0" type="text" name="nombres" >
                            </div>
                        </div>
                        <div>
                            <strong>
                                <p>Correo Electronico</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md hover:bg-slate-200 focus:outline-0" type="text" name="apellido" >
                            </div>
                        </div>
                        <div>
                            <strong>
                                <p>Contraseña ingresa para cambiar la contraseña</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md hover:bg-slate-200 focus:outline-0" type="email" name="correo" >
                            </div>
                        </div>
                        <div>
                            <strong>
                                <p>Nombres(s)</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md hover:bg-slate-200 focus:outline-0" type="text" name="direccion" >
                            </div>
                        </div>
                        <div>
                            <strong>
                                <p>Apellido(s)</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md bg-slate-200 hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md bg-slate-200 hover:bg-slate-200 focus:outline-0" type="text" name="matricula" >
                            </div>
                        </div>
                        <div>
                            <strong>
                                <p>Direccion</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md bg-slate-200 hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md bg-slate-200 hover:bg-slate-200 focus:outline-0" type="text" name="matricula" >
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
        </section>
    </main>
</body>
<script src="https://cdn.tailwindcss.com"></script>
</html>
>
