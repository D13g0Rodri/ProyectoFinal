<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu de Rutas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 font-sans">
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white p-6 rounded-lg shadow-xl w-full max-w-sm">
            <h1 class="text-3xl font-semibold text-center mb-6">Menu de Rutas</h1>
            <div class="space-y-4">
                <a href="{{ route('register') }}" class="block bg-blue-500 text-white text-center py-2 rounded-md hover:bg-blue-600 transition">Register</a>
                <a href="{{ route('login') }}" class="block bg-green-500 text-white text-center py-2 rounded-md hover:bg-green-600 transition">Login</a>
                <a href="{{ route('administracionProductos') }}" class="block bg-purple-500 text-white text-center py-2 rounded-md hover:bg-purple-600 transition">Vista Administrador</a>
            </div>
        </div>
    </div>
</body>

</html>