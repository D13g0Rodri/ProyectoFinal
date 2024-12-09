<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar Categoría</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .orbit-container {
            position: relative;
            width: 100px;
            height: 100px;
            margin: 0 auto;
        }
        .orbit {
            position: absolute;
            width: 100%;
            height: 100%;
            border: 2px dashed #6b46c1;
            border-radius: 50%;
            animation: spin 3s linear infinite;
        }
        .planet {
            position: absolute;
            width: 16px;
            height: 16px;
            background-color: #6b46c1;
            border-radius: 50%;
            top: 10%;
            right: 10%
            left: 10%;
            bottom:10%;
            transform: translate(-50%, -50%);
        }
        .planet:nth-child(2) {
            top: auto;
            bottom: 0;
        }
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body class="bg-gradient-to-r from-gray-100 to-purple-200 flex items-center justify-center min-h-screen">
    <div class="relative">
        <!-- Animación de las bolitas -->
        <div class="absolute top-[-120px] left-1/2 transform -translate-x-1/2">
            <div class="orbit-container">
                <div class="orbit">
                    <div class="planet"></div>
                    <div class="planet"></div>
                </div>
            </div>
        </div>
        
        <!-- Formulario -->
        <div class="bg-white rounded-lg shadow-lg p-8 w-96">
            <h1 class="text-2xl font-bold text-purple-700 text-center mb-6">Actualizar Categoría</h1>
            <form action="{{ route('actualizarCategoria', ['id'=> $categoria->id_categoria]) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <input type="hidden" name="id_categoria" value="{{ $categoria->id_categoria }}">
                
                <div>
                    <label for="nombre_categoria" class="block text-sm font-medium text-gray-700">Nombre de la Categoría</label>
                    <input type="text" id="nombre_categoria" name="nombre_categoria" 
                           value="{{ $categoria->nombre_categoria }}" required 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                </div>

                <div>
                    <label for="descripcion_categoria" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <input type="text" id="descripcion_categoria" name="descripcion_categoria" 
                           value="{{ $categoria->descripcion_categoria }}" required 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                </div>
                
                <button type="submit" 
                        class="w-full bg-purple-700 text-white py-2 px-4 rounded-md shadow-md hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                    Enviar
                </button>
            </form>
        </div>
    </div>
</body>
</html>
