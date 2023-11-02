<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::name('api.')->group(function() {

    Route::get('/articles/{article}', [ArticleApiController::class, 'show'])->name('articles.show');
    Route::delete('/articles/{article}', [ArticleApiController::class, 'destroy'])->name('articles.destroy');
});
