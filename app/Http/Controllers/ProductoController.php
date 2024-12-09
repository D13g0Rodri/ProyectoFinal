<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Asegúrate de incluir el modelo Producto  
use App\Services\CategoriaService;
use App\Services\ProductoService;
use App\Services\ProveedorService;
use Mockery\Undefined;

class ProductoController extends Controller
{


    public function index(Request $request, CategoriaService $CategoriaService, ProveedorService $ProveedorService, ProductoService $ProductoService)
    {
        $categorias = $CategoriaService->obtenerCategorias();
        $proveedores = $ProveedorService->obtenerProveedores();
        $productos = $ProductoService->getProductos();
        return view('adminProductos', compact('productos', 'categorias', 'proveedores'));
    }

    public function crearProducto(Request $request)
{
    $datosValidados = $request->validate([
        'nombre_producto' => 'required|unique:productos|max:255',
        'precio_producto' => 'required|numeric',
        'stock_producto' => 'required|numeric',
        'fk_id_categoria' => 'required|exists:categorias,id_categoria',
        'fk_id_proveedor' => 'required|exists:proveedors,id_proveedor',
    ]);

    try {
        Producto::create($datosValidados);
        return redirect()->route('tablaAdmin')->with('success', 'Producto creado con éxito.');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors('Hubo un error al crear el producto: ' . $e->getMessage());
    }
}


    public function formularioActualizarProducto(ProductoService $productoService, CategoriaService $categoriaService, ProveedorService $proveedorService, $id_producto){
        $producto = $productoService->obtenerProducto($id_producto);
        $categorias = $categoriaService->obtenerCategorias();
        $proveedores = $proveedorService->obtenerProveedores();
        
        if($producto && $categorias && $proveedores){
            return view('formularioActualizarProducto', compact('producto', 'categorias', 'proveedores'));
        }else{
            return redirect()->back()->withErrors('No se encontró el producto');
        }
    }

    public function actualizarProducto(Request $request, $id)
    {
        $producto = $request->validate([
            "nombre_producto" => "required|unique:productos,nombre_producto|max:255",
            "precio_producto" => "required|numeric",
            "stock_producto" => "required|numeric",
            "fk_id_categoria" => "required|numeric",
            "fk_id_proveedor" => "required|numeric",
        ]);

        $productoActual = Producto::findOrFail($id);
        $productoActual->update($producto);

        return redirect()->route("administracionProductos");
    }

    public function borrarProducto($id){
        
        $producto = Producto::findOrFail($id);
        if($producto){
            $producto->delete();
            return response()->json(['success' => 'Producto eliminado con éxito.']);
            }else{
                return response()->json(['error' => 'No se encontró el producto.']);
            }
    }
}
