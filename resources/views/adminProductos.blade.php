<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center py-10">

    <!-- Navegación de administración -->
    <article class="flex gap-6 mb-10">
        <a href="{{ route('administracionProveedores') }}" class="bg-blue-500 text-white py-2 px-4 rounded-lg shadow hover:bg-blue-600 transition">
            Crear Proveedor
        </a>
        <a href="{{ route('administracionCategorias') }}" class="bg-green-500 text-white py-2 px-4 rounded-lg shadow hover:bg-green-600 transition">
            Crear Categoría
        </a>
    </article>

    <!-- Formulario para crear producto -->
    <form action="{{ route('crearProducto') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md mb-10">
        @csrf
        <h2 class="text-2xl font-bold text-gray-700 mb-4 text-center">Crear Producto</h2>

        <div class="mb-4">
            <input 
                type="text" 
                name="nombre_producto" 
                required 
                placeholder="Nombre de producto" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
            >
        </div>
        <div class="mb-4">
            <input 
                type="number" 
                name="precio_producto" 
                required 
                placeholder="Precio de producto" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
            >
        </div>
        <div class="mb-4">
            <input 
                type="number" 
                name="stock_producto" 
                required 
                placeholder="Stock de producto" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
            >
        </div>

        <!-- Select Categoría -->
        <div class="mb-4">
            <select 
                name="fk_id_categoria" 
                required 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                <option value="">Seleccionar Categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id_categoria }}">{{ $categoria->nombre_categoria }}</option>
                @endforeach
            </select>
        </div>

        <!-- Select Proveedor -->
        <div class="mb-4">
            <select 
                name="fk_id_proveedor" 
                required 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                <option value="">Seleccionar Proveedor</option>
                @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor->id_proveedor }}">{{ $proveedor->nombre_proveedor }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">Enviar</button>
    </form>

    <!-- Tabla de productos -->
    <table class="w-full max-w-4xl bg-white shadow-lg rounded-lg">
        <thead class="bg-gray-200 text-gray-700 text-left">
            <tr>
                <th class="py-3 px-4">#</th>
                <th class="py-3 px-4">Nombre</th>
                <th class="py-3 px-4">Precio</th>
                <th class="py-3 px-4">Stock</th>
                <th class="py-3 px-4">Categoría</th>
                <th class="py-3 px-4">Proveedor</th>
                <th class="py-3 px-4" colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr class="border-t hover:bg-gray-50">
                <td class="py-3 px-4">{{ $producto->id_producto }}</td>
                <td class="py-3 px-4">{{ $producto->nombre_producto }}</td>
                <td class="py-3 px-4">{{ $producto->precio_producto }}</td>
                <td class="py-3 px-4">{{ $producto->stock_producto }}</td>
                <td class="py-3 px-4">{{ $producto->categoria->nombre_categoria ?? 'Sin categoría' }}</td>
                <td class="py-3 px-4">{{ $producto->proveedor->nombre_proveedor ?? 'Sin proveedor' }}</td>
                <td class="py-3 px-4">
                    <a href="{{ route('formularioActualizarProducto', $producto->id_producto) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">Editar</a>
                </td>
                <td class="py-3 px-4">
                    <a href="{{ route('borrarProducto', $producto->id_producto) }}" onclick="return confirm('¿Estás seguro de borrarlo?')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">Borrar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
