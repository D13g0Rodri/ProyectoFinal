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
        <a href="{{ route('administracionProductos') }}" class="bg-blue-500 text-white py-2 px-4 rounded-lg shadow hover:bg-blue-600 transition">
            Crear Producto
        </a>
        <a href="{{ route('administracionCategorias') }}" class="bg-green-500 text-white py-2 px-4 rounded-lg shadow hover:bg-green-600 transition">
            Crear Categoría
        </a>
    </article>

    <!-- Formulario para crear proveedor -->
    <form action="{{ route('crearProveedor') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md mb-10">
        @csrf
        <h2 class="text-2xl font-bold text-gray-700 mb-4 text-center">Crear Proveedor</h2>

        <div class="mb-4">
            <input type="text" name="nombre_proveedor" placeholder="Nombre del proveedor" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <input type="text" name="direccion_proveedor" placeholder="Dirección del proveedor" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <input type="text" name="telefono_proveedor" placeholder="Teléfono del proveedor" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <input type="text" name="correo_proveedor" placeholder="Correo del proveedor" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <input type="text" name="descripcion_proveedor" placeholder="Descripción del proveedor" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">Crear</button>
    </form>

    <!-- Tabla de proveedores -->
    <table class="w-full max-w-4xl bg-white shadow-lg rounded-lg">
        <thead class="bg-gray-200 text-gray-700 text-left">
            <tr>
                <th class="py-3 px-4">#</th>
                <th class="py-3 px-4">Nombre</th>
                <th class="py-3 px-4">Dirección</th>
                <th class="py-3 px-4">Teléfono</th>
                <th class="py-3 px-4">Correo</th>
                <th class="py-3 px-4">Descripción</th>
                <th class="py-3 px-4">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as $proveedor)
            <tr class="border-t hover:bg-gray-50">
                <td class="py-3 px-4">{{ $proveedor->id_proveedor }}</td>
                <td class="py-3 px-4">{{ $proveedor->nombre_proveedor }}</td>
                <td class="py-3 px-4">{{ $proveedor->direccion_proveedor }}</td>
                <td class="py-3 px-4">{{ $proveedor->telefono_proveedor }}</td>
                <td class="py-3 px-4">{{ $proveedor->correo_proveedor }}</td>
                <td class="py-3 px-4">{{ $proveedor->descripcion_proveedor }}</td>
                <td class="py-3 px-4 flex gap-3">
                    <a href="{{ route('formularioActualizarProveedor', $proveedor->id_proveedor) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">Actualizar</a>
                    <a href="{{ route('borrarProveedor', $proveedor->id_proveedor) }}" onclick="return confirm('¿Estás seguro de borrarlo?')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">Borrar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
