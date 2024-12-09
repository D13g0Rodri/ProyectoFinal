<?php

namespace App\Http\Controllers;


use App\Services\ProveedorService;
use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    public function index(ProveedorService $proveedorService)
    {
        $proveedores = $proveedorService->obtenerProveedores();
        return view("adminProveedores", compact('proveedores'));
    }

    public function crearProveedor(Request $request)
    {
        $validate = $request->validate([
            'nombre_proveedor' => 'required|unique:proveedors|max:255',
            'direccion_proveedor' => 'required',
            'telefono_proveedor' => 'required',
            'correo_proveedor' => 'required',
            'descripcion_proveedor' => 'required'
        ]);
        Proveedor::create($validate);
        return redirect()->route("administracionProveedores");
    }

    public function formularioActualizarProveedor(ProveedorService $proveedorService, $id_proveedor)
    {
        if (!is_numeric($id_proveedor) || $id_proveedor <= 0) {
            return view("404");
        }
        $proveedor = $proveedorService->obtenerProveedor($id_proveedor);
        if ($proveedor == null || empty($proveedor)) {
            return view("404");
        } else {
            return view("formularioActualizarProveedor", compact('proveedor'));
        }
    }

    public function actualizarProveedor(Request $request, $id)
    {
        $proveedor = Proveedor::find($id);

        if ($proveedor) {
            // Actualiza el proveedor
            $proveedor->nombre_proveedor = $request->input('nombre_proveedor');
            $proveedor->direccion_proveedor = $request->input('direccion_proveedor');
            $proveedor->telefono_proveedor = $request->input('telefono_proveedor');
            $proveedor->correo_proveedor = $request->input('correo_proveedor');
            $proveedor->descripcion_proveedor = $request->input('descripcion_proveedor');

            if ($proveedor->save()) {
                return redirect()->route('administracionProveedores', ['id' => $proveedor->id_proveedor])->with('success', 'Proveedor actualizado');
            } else {
                return back()->with('error', 'No se pudo actualizar el proveedor');
            }
        } else {
            return redirect()->route('formularioActualizarProveedor', ['id' => $id])->with('error', 'Proveedor no encontrado');
        }
    }


    public function borrarProveedor(ProveedorService $proveedorService, $id)
    {
        if ($proveedorService->borrarProveedor($id)) {
            return redirect()->back();
        } else {
            echo "PATU CASA GORDA PUTA";
        }
    }
}
