<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// Auth::routes();
Route::get('api/login', function () {
    return response("Unauthorized", 401);
})->name('login');

Route::middleware('auth:api')->prefix('v1')->group(function () {
    Route::get('user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('/authors', AuthorController::class);
    Route::apiResource('/books', BookController::class);

});
Route::get('/test', function () {
    echo "authenticated";
});

Route::get('/author/booksdetail', function () {
    $a = Author::find(7);
    return $a->books[4];
});
