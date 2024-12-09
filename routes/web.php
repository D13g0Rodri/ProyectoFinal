<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//VISTA DE LA TABLA DE ADMIN
Route::get('/administracionProductos', [ProductoController::class, "index"])->name("administracionProductos");

//                                  ---RUTAS PARA PROVEEDORES---

// Proveedor
//---ver---
Route::get("/administracionProveedores", [ProveedorController::class, "index"])->name("administracionProveedores");
//---crear---
Route::post("/crearProveedor", [ProveedorController::class, "crearProveedor"])->name("crearProveedor");
//---Actualizar---
Route::get("/formularioActualizarProveedor/{id}", [ProveedorController::class, "formularioActualizarProveedor"])->name("formularioActualizarProveedor");
Route::put("/actualizarProveedor/{id}", [ProveedorController::class, "actualizarProveedor"])->name("actualizarProveedor");
//---Borrar---
Route::get("/borrarProveedor/{id}", [ProveedorController::class, "borrarProveedor"])->name("borrarProveedor");

//                                  ---RUTAS PARA PROVEEDORES---
// Categoria
//---ver---
Route::get("/administracionCategorias", [CategoriaController::class, 'index'])->name("administracionCategorias");
//---crear---
Route::post("/crearCategoria", [CategoriaController::class, "crearCategoria"]) -> name("crearCategoria");
//---Actualizar---
Route::get("/formularioActualizarCategoria/{id}", [CategoriaController::class, "formularioActualizarCategoria"])->name("formularioActualizarCategoria");
Route::put("/actualizarCategoria/{id}", [CategoriaController::class, "actualizarCategoria"])->name("actualizarCategoria");
//---Borrar---
Route::get("/borrarCategoria/{id}", [CategoriaController::class, 'borrarCategoria'])->name("borrarCategoria");

//                                  ---RUTAS PARA PROVEEDORES---
//crear producto
Route::post("/crearProducto", [ProductoController::class, "crearProducto"]) -> name("crearProducto");
Route::get("/formularioActualizarProducto/{id}", [ProductoController::class, "formularioActualizarProducto"])->name("formularioActualizarProducto");
Route::put("/actualizarProducto/{id}", [ProductoController::class, 'actualizarProducto'])->name('actualizarProducto');
Route::get("/borrarProducto/{id}", [ProductoController::class, "borrarProducto"])->name("borrarProducto");

                            //--RUTAS PARA ACTUALIZAR---










Route::get("/error", function(){
    return view("404.html");
})->name("404");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
