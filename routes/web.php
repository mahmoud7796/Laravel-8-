<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Models\User;
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
/*define('PAGINATION',5);*/
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=> 'auth:sanctum', 'verified'], function () {
    Route::get('/dashboard', [UserController::class,'getData'])->name('dashboard');

    ######## Start Category ############

    Route::get('/all-category', [CategoryController::class,'AllCat'])-> name('all.category');
    Route::post('/store', [CategoryController::class,'store'])-> name('category.store');
    Route::get('/edit/{id}', [CategoryController::class,'edit'])-> name('category.edit');
    Route::post('/update/{id}', [CategoryController::class,'update'])-> name('category.update');
    Route::get('/move-trash/{id}', [CategoryController::class,'MoveTrash'])-> name('category.trash');
    Route::get('/restore/{id}', [CategoryController::class,'restore'])-> name('category.restore');
    Route::get('/delete/{id}', [CategoryController::class,'delete'])-> name('category.delete');

    ######## End Category ############


    ######## Start Brands ############

    Route::get('/index', [BrandController::class,'index'])-> name('brand.index');
    Route::post('/brand-store', [BrandController::class,'store'])-> name('brand.store');
    Route::get('/brand-edit/{id}', [BrandController::class,'edit'])-> name('brand.edit');
    Route::post('/brand-update/{id}', [BrandController::class,'update'])-> name('brand.update');
    Route::get('/brand-delete/{id}', [BrandController::class,'delete'])-> name('brand.delete');

    ######## End Brands ############

});






