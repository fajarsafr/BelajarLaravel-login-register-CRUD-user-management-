<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/loginproses',[LoginController::class,'loginproses'])->name('loginproses');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');


Route::group(['prefix' => 'admin','middleware'=> ['auth'], 'as'=>'admin.'],function(){
    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
    Route::get('/user',[HomeController::class,'index'])->name('index');
    Route::get('/create',[HomeController::class,'create'])->name('usercreate');
    Route::post('/store',[HomeController::class,'store'])->name('userstore');
    Route::get('/edit/{id}',[HomeController::class,'edit'])->name('useredit');
    Route::put('/update/{id}',[HomeController::class,'update'])->name('userupdate');
    Route::delete('/userdelete/{id}', [HomeController::class, 'delete'])->name('userdelete');

});


Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/registerproses',[LoginController::class,'registerproses'])->name('registerproses');

