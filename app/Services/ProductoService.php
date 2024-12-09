<?php 
namespace App\Services;
use App\Models\Producto;

class ProductoService{
    public function getProductos(){
        $productos = Producto::all();
        return $productos;
    }

    public function obtenerProducto($id_producto)
    {
        $producto = Producto::find($id_producto);
        if($producto){
            return $producto;
        }else{
            return null;
        }
        
    }
    
}
?>