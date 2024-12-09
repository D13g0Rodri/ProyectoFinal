<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar Proveedor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fade-in 0.5s ease-out;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-200 via-purple-200 to-gray-100 h-screen flex items-center justify-center">
    <div class="w-full max-w-lg bg-white rounded-lg shadow-lg p-6 fade-in">
        <h2 class="text-2xl font-bold text-purple-600 mb-6 text-center">Actualizar Proveedor</h2>
        <form action="{{ route('actualizarProveedor', ['id' => $proveedor->id_proveedor]) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Campo oculto para el ID del proveedor -->
            <input type="hidden" name="id_proveedor" value="{{ $proveedor->id_proveedor }}">

            <!-- Campo para el nombre del proveedor -->
            <div>
                <label for="nombre_proveedor" class="block text-gray-700 font-medium">Nombre del Proveedor</label>
                <input type="text" id="nombre_proveedor" name="nombre_proveedor" 
                    value="{{ $proveedor->nombre_proveedor }}" required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
            </div>

            <!-- Campo para la dirección del proveedor -->
            <div>
                <label for="direccion_proveedor" class="block text-gray-700 font-medium">Dirección</label>
                <input type="text" id="direccion_proveedor" name="direccion_proveedor" 
                    value="{{ $proveedor->direccion_proveedor }}" required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
            </div>

            <!-- Campo para el teléfono del proveedor -->
            <div>
                <label for="telefono_proveedor" class="block text-gray-700 font-medium">Teléfono</label>
                <input type="text" id="telefono_proveedor" name="telefono_proveedor" 
                    value="{{ $proveedor->telefono_proveedor }}" required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
            </div>

            <!-- Campo para el correo del proveedor -->
            <div>
                <label for="correo_proveedor" class="block text-gray-700 font-medium">Correo Electrónico</label>
                <input type="email" id="correo_proveedor" name="correo_proveedor" 
                    value="{{ $proveedor->correo_proveedor }}" required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
            </div>

            <!-- Campo para la descripción del proveedor -->
            <div>
                <label for="descripcion_proveedor" class="block text-gray-700 font-medium">Descripción</label>
                <textarea id="descripcion_proveedor" name="descripcion_proveedor" required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">{{ $proveedor->descripcion_proveedor }}</textarea>
            </div>

            <!-- Botón de envío -->
            <div class="text-center">
                <button type="submit" 
                    class="px-6 py-2 bg-purple-600 text-white font-medium rounded-lg shadow-md hover:bg-purple-700 transition">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</body>
</html>
