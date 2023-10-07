<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProfileController;
use App\Models\Brand;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// BRAND
Route::middleware(['auth', 'verified'])->group(function () {
    //menampilkan Data
    Route::get('/brands', [BrandController::class, 'index'])->name('brand.index');
    //form tambah data
    Route::get('/brands/create', [BrandController::class, 'create'])->name('brand.create');
    //tamabha data ke db
    Route::post('/brands', [BrandController::class, 'store'])->name('brand.store');
    //menampilkan form edit
    Route::get('/brands{id}/edit', [BrandController::class, 'edit'])->name('brand.edit');
    //update ke database
    Route::put('/brands{id}', [BrandController::class, 'update'])->name('brand.update');

    //delete
    Route::delete('/brands{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
