<?php 
namespace App\Services;
use App\Models\Categoria;


class CategoriaService{

    public function obtenerCategoria($id){
        $categoria = Categoria::find($id);
        if ($categoria){
            return $categoria; 
        }else{
            return null;
        }
    }
    public function obtenerCategorias(){
        $categorias = Categoria::all();
        return $categorias;
    }

    public function actualizarCategoria($id, $data){
        $categoria = Categoria::find($id);

        if(!$categoria){
           return false;
        }
        $categoria->fill($data);

        return $categoria->save();
    }

    public function borrarCategoria($id){
        $categoria = Categoria::find($id);
        if ($categoria){
            if ($categoria->delete()){
                return true;
            }
        }else{
            return false;
        }
    }
}

?>