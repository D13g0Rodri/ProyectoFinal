<?php

namespace App\Services;

use App\Models\Proveedor;


class ProveedorService
{
    public function obtenerProveedores()
    {
        $proveedores = Proveedor::all();
        return $proveedores;
    }

    public function obtenerProveedor($id_proveedor)
    {
        $proveedor = Proveedor::find($id_proveedor);
        return $proveedor;
    }


    public function actualizarProveedores($id_proveedor, $data)
    {
        // Buscar el proveedor por su ID
        $proveedor = Proveedor::find($id_proveedor);

        // Verificar si existe
        if (!$proveedor) {
            return false; // Indicar que no se encontró el proveedor
        }

        // Actualizar los datos del proveedor
        $proveedor->nombre_proveedor = $data['nombre_proveedor'];
        $proveedor->direccion_proveedor = $data['direccion_proveedor'];
        $proveedor->telefono_proveedor = $data['telefono_proveedor'];
        $proveedor->correo_proveedor = $data['correo_proveedor'];
        $proveedor->descripcion_proveedor = $data['descripcion_proveedor'];

        // Guardar los cambios
        return $proveedor->save(); // Retorna true si se guarda correctamente
    }


    public function borrarProveedor($id_proveedor)
    {
        $proveedor = Proveedor::find($id_proveedor);
        if ($proveedor->delete()) {
            return true;
        } else {
            return false;
        }
    }
}
