<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;

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


Route::resource('articles', ArticleController::class);
Route::get('articles/{article}/incrementStock', [ArticleController::class, 'incrementStock'])->name('articles.incrementStock');
Route::put('articles/{article}/incrementStock', [ArticleController::class, 'incrementStock'])->name('articles.stock');

Route::get('/', [ArticleController::class, 'index']);
