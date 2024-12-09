<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Services\CategoriaService;

class CategoriaController extends Controller
{
    public function index(CategoriaService $categoriaService){
        $categorias = $categoriaService->obtenerCategorias();
        if(empty($categorias)){
            return redirect()->route("404");
        }else{
            return view('adminCategorias', compact('categorias'));
        }
    }
    public static function crearCategoria(Request $request){
        $validate = $request -> validate([
            "nombre_categoria" => 'required|unique:categorias|max:255',
            "descripcion_categoria" => "required"
        ]);
        Categoria::create($validate);
        return redirect()->route('administracionCategorias');
    }

    public function formularioActualizarCategoria(CategoriaService $categoriaService, $id){
        $categoria = $categoriaService->obtenerCategoria($id);
        if($categoria){
            return view('formularioActualizarCategoria', compact('categoria'));
        }else{
            return view("404");
        }
    }

    public function actualizarCategoria(Request $request,$id, CategoriaService $categoriaService){
        $categoria = $request->validate([
            "nombre_categoria" => 'required|unique:categorias,nombre_categoria,'.$id.',id_categoria|max:255',
            "descripcion_categoria" => "required"
        ]);
        
        $categoriaService->actualizarCategoria($id, $categoria);
        
        return redirect()->route('administracionCategorias');
    }



    public function borrarCategoria(CategoriaService $categoriaService, $id){
        if($categoriaService->borrarCategoria($id)){
            return redirect()->route('administracionCategorias');
        }else{
            return redirect()->route('404');
        };

    }
    }   
