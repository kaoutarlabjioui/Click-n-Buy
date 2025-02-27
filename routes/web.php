<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('produits');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';




Route::prefix('admin')->group(function () {
    /*----------------------------------produits-------------------------*/
    Route::get('/produits/showproduits',[ProduitController::class,'showProduit']);
    Route::post('/produits/store',[ProduitController::class,'store']);
    Route::delete('/produits/destroy',[ProduitController::class,'destroy']);
    Route::get('/updateform/{id}',[ProduitController::class,'updateform']);
    Route::post('/produits/update',[ProduitController::class,'update']);
    /*------------------------categorie---------------------------------------*/
    Route::post('/categories/update',[CategorieController::class,'update']);
    Route::post('/categories/store',[CategorieController::class,'store']);
    Route::delete('/categories/destroy',[CategorieController::class,'destroy']);
    Route::get('/categories/showCategorie',[CategorieController::class,'showCategorie']);
    Route::get('/updatecat/{id}',[CategorieController::class,'updateform']);

});

Route::get('/produits',[ProduitController::class,'index']);
Route::post('/produits/details',[ProduitController::class,'detailsProduits']);
Route::post('/produits/ajouter',[ProduitController::class,'ajouter']);
// Route::post();





