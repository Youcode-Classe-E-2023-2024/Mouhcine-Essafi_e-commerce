<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [ProductController::class, 'liste_produits']);

Route::get('/products', [ProductController::class, 'liste_produits']);
Route::post('/products/create', [ProductController::class, 'create_produit']);
// Route::get('/products/edit/{id}', [ProductController::class, 'edit']);
Route::post('/products/edit', [ProductController::class, 'update_produit']);
Route::get('/products/delete/{id}', [ProductController::class, 'delete_produit']);
Route::get('/products/show/{id}', [ProductController::class, 'show']);
