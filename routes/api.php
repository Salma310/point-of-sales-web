<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\UserController;
use Monolog\Level;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
// Route::post('/register1', App\Http\Controllers\Api\RegisterController::class)->name('register1');

Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');
Route::get('/login', App\Http\Controllers\Api\LoginController::class)->name('login');
// Route::middleware('auth:sanctum')->get('/user', [LoginController::class, 'getUser'])->name('user');
Route::middleware('auth:api')->get('/user', function (Request $request){
    return $request->user();
});
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');

Route::get('levels', [LevelController::class, 'index']);
Route::post('levels', [LevelController::class, 'store']);
Route::get('levels/{level}', [LevelController::class, 'show']);
Route::put('levels/{level}', [LevelController::class, 'update']);
Route::delete('levels/{level}', [LevelController::class, 'destroy']);

Route::get('users', [App\Http\Controllers\Api\UserController::class, 'index']);
Route::post('users', [App\Http\Controllers\Api\UserController::class, 'store']);
Route::get('users/{user}', [App\Http\Controllers\Api\UserController::class, 'show']);
Route::put('users/{user}', [App\Http\Controllers\Api\UserController::class, 'update']);
Route::delete('users/{user}', [App\Http\Controllers\Api\UserController::class, 'destroy']);

Route::get('kategori', [App\Http\Controllers\Api\KategoriController::class, 'index']);
Route::post('kategori', [App\Http\Controllers\Api\KategoriController::class, 'store']);
Route::get('kategori/{kategori}', [App\Http\Controllers\Api\KategoriController::class, 'show']);
Route::put('kategori/{kategori}', [App\Http\Controllers\Api\KategoriController::class, 'update']);
Route::delete('kategori/{kategori}', [App\Http\Controllers\Api\KategoriController::class, 'destroy']);

Route::get('barang', [App\Http\Controllers\Api\BarangController::class, 'index']);
Route::post('barang', [App\Http\Controllers\Api\BarangController::class, 'store']);
Route::get('barang/{barang}', [App\Http\Controllers\Api\BarangController::class, 'show']);
Route::put('barang/{barang}', [App\Http\Controllers\Api\BarangController::class, 'update']);
Route::delete('barang/{barang}', [App\Http\Controllers\Api\BarangController::class, 'destroy']);