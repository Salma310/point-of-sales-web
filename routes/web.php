<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PosController;



use Monolog\Level;

//JOBSHEET 2 : MEMBUAT ROUTE

//Controller Class Home
Route::get('/', [HomeController::class, 'home'])->name('home');

//Controller Class Category Daftar Produk
Route::prefix('category')->group(function () {
    Route::get('baby-kid', [ProductController::class, 'babyKid'])->name('category.baby-kid');
    Route::get('beauty-health', [ProductController::class, 'beautyHealth'])->name('category.beauty-health');
    Route::get('food-beverage', [ProductController::class, 'foodBeverage'])->name('category.food-beverage');
    Route::get('home-care', [ProductController::class, 'homeCare'])->name('category.home-care');
});

//Controller Class User/Profil
// Route::get('user/{id}/name/{name}', [UserController::class, 'profile'])->name('user.profile');

//Controller Class Saless/Penjualan
Route::get('sales', [SalesController::class, 'index'])->name('sales.index');

//================================================================================

//Jobsheet 3 : Implementasi DB FACADE
Route::get('/level', [LevelController::class, 'index']);

//Query Builder
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WelcomeController;
use Monolog\Handler\RotatingFileHandler;

Route::get('/kategori', [KategoriController::class, 'index']);


//Eloquent ORM
Route::get('/user', [UserController::class, 'index']);

//Jobsheet 4 : ORM CRUD
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);


//Jobsheet 7 

Route::pattern('id', '[0-9]+'); //artinya ketika ada parameter{id}, maka harus berupa angka


Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'postRegister']);

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function(){ //artinya semua route di dalam group ini harus login dulu

    //masukkan semua route yang perlu autentikasi disni
    Route::get('/', [WelcomeController::class, 'index']);

    //route level
    
    //Semua route didalam grup dibawah ini harus punya role ADM (administrator)
    Route::middleware(['authorize:ADM'])->group(function(){
        Route::group(['prefix' => 'user'], function(){
            Route::get('/', [UserController::class, 'index']);          //menampilkan halaman awal user
            Route::post('/list', [UserController::class, 'list']);      //menampilkan data user dalam bentuk json untuk datatables
            Route::get('/create', [UserController::class, 'create']);   //Menampilkan halaman form tambah user
            Route::post('/', [UserController::class, 'store']);         //Menyimpan data user baru
            Route::get('/create_ajax', [UserController::class, 'create_ajax']); //Menampilkan halaman form tambah user ajax
            Route::post('/ajax', [UserController::class, 'store_ajax']);      //Menyimpan data user baru ajax   
            Route::get('/{id}', [UserController::class, 'show']);       //menampilkan detail user
            Route::get('/{id}/edit', [UserController::class, 'edit']);  //menampilkan halaman form edit user
            Route::put('/{id}', [UserController::class, 'update']);     //menyimpan perubahan data user
            Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']); //Menampilkan halaman form edit user Ajax
            Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);  //Menyimpan perubahan data user
            Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);  //tampilan form confirm ddelete user Ajax
            Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); //untuk hapus data user ajax
            Route::delete('/{id}', [UserController::class, 'destroy']); //mengahapus data user
        });
    
        Route::group(['prefix' => 'level'], function(){
            Route::get('/', [LevelController::class, 'index']);          
            Route::post('/list', [LevelController::class, 'list']);    
            Route::get('/create', [LevelController::class, 'create']);   
            Route::post('/', [LevelController::class, 'store']);       
            Route::get('/create_ajax', [LevelController::class, 'create_ajax']); 
            Route::post('/ajax', [LevelController::class, 'store_ajax']);   
            Route::get('/{id}', [LevelController::class, 'show']);       
            Route::get('/{id}/edit', [LevelController::class, 'edit']); 
            Route::put('/{id}', [LevelController::class, 'update']);    
            Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']); 
            Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);  
            Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);  
            Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); 
            Route::delete('/{id}', [LevelController::class, 'destroy']); 
        });  
    });

    Route::middleware(['authorize:ADM,MNG'])->group(function(){
        Route::group(['prefix' => 'supplier'], function(){
            Route::get('/', [SupplierController::class, 'index']);          
            Route::post('/list', [SupplierController::class, 'list']);     
            Route::get('/create', [SupplierController::class, 'create']);  
            Route::post('/', [SupplierController::class, 'store']);         
            Route::get('/create_ajax', [SupplierController::class, 'create_ajax']); 
            Route::post('/ajax', [SupplierController::class, 'store_ajax']); 
            Route::get('/{id}', [SupplierController::class, 'show']);      
            Route::get('/{id}/edit', [SupplierController::class, 'edit']); 
            Route::put('/{id}', [SupplierController::class, 'update']);     
            Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']); 
            Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);  
            Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);  
            Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']); 
            Route::delete('/{id}', [SupplierController::class, 'destroy']); 
        });
    });

    Route::middleware(['authorize:ADM,MNG,STF'])->group(function(){
        Route::group(['prefix' => 'kategori'], function(){
            Route::get('/', [KategoriController::class, 'index']);         
            Route::post('/list', [KategoriController::class, 'list']);      
            Route::get('/create', [KategoriController::class, 'create']);   
            Route::post('/', [KategoriController::class, 'store']);         
            Route::get('/create_ajax', [KategoriController::class, 'create_ajax']); 
            Route::post('/ajax', [KategoriController::class, 'store_ajax']);      
            Route::get('/{id}', [KategoriController::class, 'show']);      
            Route::get('/{id}/edit', [KategoriController::class, 'edit']);  
            Route::put('/{id}', [KategoriController::class, 'update']);     
            Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']); 
            Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);  
            Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);  
            Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']); 
            Route::delete('/{id}', [KategoriController::class, 'destroy']); 
        });   
        Route::group(['prefix' => 'barang'], function(){
            Route::get('/', [BarangController::class, 'index']);          
            Route::post('/list', [BarangController::class, 'list']);            
            Route::get('/create_ajax', [BarangController::class, 'create_ajax']);
            Route::post('/ajax', [BarangController::class, 'store_ajax']);    
            Route::get('/{id}/show_ajax', [BarangController::class, 'show_ajax']);         
            Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); 
            Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']); 
            Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);  
            Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); 
            Route::get('/import', [BarangController::class, 'import']);   
            Route::post('/import_ajax', [BarangController::class, 'import_ajax']);     
            Route::get('/export_excel', [BarangController::class, 'export_excel']);  
            Route::get('/export_pdf', [BarangController::class, 'export_pdf']);    
        });  
    });
});