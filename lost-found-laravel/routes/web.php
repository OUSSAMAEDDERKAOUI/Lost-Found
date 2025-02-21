<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\http\controllers\AnnonceController;
use App\http\controllers\CommentController;
use App\http\controllers\UserController;
use App\Http\Controllers\CategorietController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your Application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', [CategorietController::class,'showCategories'])->name('home');

Route::get('/home', [AnnonceController::class,'index'])->name('home');
Route::get('/home/{id}', [AnnonceController::class,'show'])->name('details');
// Route::get('/home', [AnnonceController::class, 'countAnnonces'])->name('home');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('annonce/store',[AnnonceController::class,'store'])->name('store');
Route::post('comment/add',[CommentController::class,'add'])->name('add');

Route::post('/search', [AnnonceController::class, 'search'])->name('search');

 
require __DIR__.'/auth.php';
