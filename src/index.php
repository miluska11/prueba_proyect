<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/dist/output.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Abel&family=Alegreya:ital@1&family=Asap+Condensed&family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
  <link href="/dist/output.css" rel="stylesheet">
  <style>
    body {
      background-image: url("../img/universidad.png");
      background-size: cover;
      background-position: center;
      margin: 0;
      padding: 0;
    }

    h2 {
      font-family: 'Abel', sans-serif;
      font-size: 1.5rem;
      font-weight: 600;
      color: #374151;
    }

    .no-outline:focus {
      outline: none;
      border: 1px solid #D1D5DB; 
    }
  </style>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-black bg-opacity-50 box-border border-box">
    <img class="w-[300px] mx-auto mb-4" src="../img/logo.jpg" alt="logo">
    <h2 class="text-2xl mb-4 text-center font-semibold">Welcome, login with your account</h2>
    <form action="../src/acciones/login.php" method="POST" class="space-y-4">
      <div>
        <label for="username" class="block font-medium text-gray-700">Username</label>
        <input type="text" id="correo" name="correo" class="w-full md:w-96 rounded-md p-2 shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300 no-outline">
      </div>
      <div>
        <label for="password" class="block font-medium text-gray-700">Password</label>
        <input type="password" id="contrasena" name="contrasena" class="w-full md:w-96 rounded-md p-2 shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300 no-outline">
        <input type="hidden" name="accion" value="acceso_username">
      </div>
      <button type="submit" class="w-full bg-gray-700 text-white py-2 rounded-md hover:bg-gray-800 shadow-md">Log In</button>

    </form>
  </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>
</html>
