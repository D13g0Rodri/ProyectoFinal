<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administración de Categorías</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center py-10">

    <!-- Navegación -->
    <article class="flex gap-6 mb-10">
        <a href="{{ route('administracionProductos') }}" class="bg-blue-500 text-white py-2 px-4 rounded-lg shadow hover:bg-blue-600 transition">
            Crear Producto
        </a>
        <a href="{{ route('administracionProveedores') }}" class="bg-green-500 text-white py-2 px-4 rounded-lg shadow hover:bg-green-600 transition">
            Crear Proveedor
        </a>
    </article>

    <!-- Formulario para crear categoría -->
    <form action="{{ route('crearCategoria') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md mb-10">
        @csrf
        <h2 class="text-2xl font-bold text-gray-700 mb-4 text-center">Crear Categoría</h2>
        <div class="mb-4">
            <input 
                type="text" 
                name="nombre_categoria" 
                placeholder="Nombre de la categoría" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                required>
        </div>
        <div class="mb-4">
            <input 
                type="text" 
                name="descripcion_categoria" 
                placeholder="Descripción de la categoría" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                required>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">Crear</button>
    </form>

    <!-- Tabla de categorías -->
    <table class="w-full max-w-4xl bg-white shadow-lg rounded-lg">
        <thead>
            <tr class="bg-gray-200 text-gray-700 text-left">
                <th class="py-3 px-4">ID</th>
                <th class="py-3 px-4">Nombre</th>
                <th class="py-3 px-4">Descripción</th>
                <th class="py-3 px-4">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr class="border-t hover:bg-gray-50">
                <td class="py-3 px-4">{{ $categoria->id_categoria }}</td>
                <td class="py-3 px-4">{{ $categoria->nombre_categoria }}</td>
                <td class="py-3 px-4">{{ $categoria->descripcion_categoria }}</td>
                <td class="py-3 px-4 flex space-x-2">
                    <a href="{{ route('formularioActualizarCategoria', $categoria->id_categoria) }}" 
                        class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">Actualizar</a>
                    <a href="{{ route('borrarCategoria', $categoria->id_categoria) }}" 
                        onclick="return confirm('¿Estás seguro de borrarlo?')" 
                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">Borrar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
