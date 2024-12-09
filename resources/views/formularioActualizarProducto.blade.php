<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes jump {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-60px); }
        }
        .jump { animation: jump 3s infinite ease-in-out; }
        .jump:nth-child(odd) { animation-delay: 0.5s; }
    </style>
</head>
<body class="flex justify-center items-center h-screen bg-gradient-to-b from-lavender-200 to-gray-300">
    <div class="flex items-center space-x-6 w-full max-w-4xl bg-white rounded-lg shadow-lg p-6">
        <!-- Animación izquierda -->
        <div class="flex-1 flex justify-end relative">
            <div class="absolute bottom-2 w-4 h-4 bg-purple-700 rounded-full jump"></div>
            <div class="absolute bottom-8 w-4 h-4 bg-purple-700 rounded-full jump"></div>
        </div>
        
        <!-- Formulario -->
        <div class="w-2/4 bg-gray-100 p-6 rounded-lg">
            <h2 class="text-center text-2xl font-bold text-purple-700 mb-6">Actualizar Producto</h2>
            <form action="{{ route('actualizarProducto', $producto->id_producto) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <input type="text" name="nombre_producto" value="{{ $producto->nombre_producto }}" required 
                    class="w-full p-3 border rounded-md" placeholder="Nombre del producto">
                <input type="number" name="precio_producto" value="{{ $producto->precio_producto }}" required 
                    class="w-full p-3 border rounded-md" placeholder="Precio del producto">
                <input type="number" name="stock_producto" value="{{ $producto->stock_producto }}" required 
                    class="w-full p-3 border rounded-md" placeholder="Stock del producto">
                <select name="fk_id_categoria" required class="w-full p-3 border rounded-md">
                    <option value="">Seleccionar Categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}" 
                            {{ $producto->fk_id_categoria == $categoria->id_categoria ? 'selected' : '' }}>
                            {{ $categoria->nombre_categoria }}
                        </option>
                    @endforeach
                </select>
                <select name="fk_id_proveedor" required class="w-full p-3 border rounded-md">
                    <option value="">Seleccionar Proveedor</option>
                    @foreach ($proveedores as $proveedor)
                        <option value="{{ $proveedor->id_proveedor }}" 
                            {{ $producto->fk_id_proveedor == $proveedor->id_proveedor ? 'selected' : '' }}>
                            {{ $proveedor->nombre_proveedor }}
                        </option>
                    @endforeach
                </select>
                <input type="submit" value="Actualizar Producto" 
                    class="w-full p-3 bg-purple-700 text-white rounded-md hover:bg-purple-800 cursor-pointer">
            </form>
        </div>
        
        <!-- Animación derecha -->
        <div class="flex-1 flex justify-start relative">
            <div class="absolute bottom-2 w-4 h-4 bg-purple-700 rounded-full jump"></div>
            <div class="absolute bottom-8 w-4 h-4 bg-purple-700 rounded-full jump"></div>
        </div>
    </div>
</body>
</html>
