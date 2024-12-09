<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $primaryKey = 'id_producto';
    protected $keyType = 'int';

    protected $fillable = [
        'nombre_producto',
        'precio_producto',
        'stock_producto',
        'fk_id_categoria',
        'fk_id_proveedor',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'fk_id_categoria', 'id_categoria');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'fk_id_proveedor', 'id_proveedor');
    }
}