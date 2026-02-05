<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FavorieController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMidlleware;
use App\Http\Middleware\UserMidlleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

// Route::get('/', [ProduitController::class,'index']);





Route::post('/login',[UserController::class,'login'])->name('login');
Route::get('/login',[UserController::class,'loginform'])->name('loginform');

Route::post('/register',[UserController::class,'register'])->name('register');
Route::get('/register',[UserController::class,'registerform'])->name('registerform');

Route::get('/logout',[UserController::class,'logout'])->name('logout')->middleware('auth');

Route::resource('Produit',ProduitController::class)->middleware('auth',AdminMidlleware::class);

Route::resource('Categorie',CategorieController::class)->middleware('auth',AdminMidlleware::class);

Route::post('/favorie/{id}', [FavorieController::class, 'store'])->name('ffavorie.store');

Route::resource('Favorie',FavorieController::class)->middleware(UserMidlleware::class);
// ->middleware(UserMidlleware::class)

