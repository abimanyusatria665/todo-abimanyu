<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;


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



Route::middleware('isGuest')->group(function(){

Route::get('/regis', [RegisterController::class, 'register']);
Route::post('/regis', [RegisterController::class, 'inputRegister'])->name('register.post');
Route::get('/', [LoginController::class,'index'])->name('login');
Route::get('/login', [LoginController::class,'index'])->name('login');

Route::post('/login', [LoginController::class,'auth'])->name('login');
});


Route::get('/logout', [LoginController::class,'logout'])->name('logout');


//todo
   Route::middleware('isLogin')->prefix('/todo')->name('todo.')->group(function (){
   Route::get('/', [GalleryController::class, 'index'])->name('index');
   Route::get('/complated', [GalleryController::class, 'complated'])->name('complated');
   Route::get('/create', [GalleryController::class, 'create'])->name('create');
   Route::post('/store', [GalleryController::class, 'store'])->name('store');
   Route::get('/edit/{id}', [GalleryController::class, 'edit'])->name('edit');
   Route::patch('/update/{id}', [GalleryController::class, 'update'])->name('update');
   Route::patch('/complated/{id}', [GalleryController::class, 'updateComplated'])->name('update-complated');
   Route::delete('/delete/{id}', [GalleryController::class, 'destroy'])->name('delete');


});