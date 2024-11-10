<?php
//backend
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\GaleryController;
use App\Http\Middleware\PreventBackAfterLogo;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\VHomeController;



// frontend
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\CategoryController;
Route::get('/search', [SearchController::class, 'search'])->name('search');




Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', PreventBackAfterLogo::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', PreventBackAfterLogo::class])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit'); // Menampilkan form edit
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Untuk update
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Untuk delete

    // Resource Routes
    Route::resource('informasi', InformasiController::class);
    


    Route::resource('agenda', AgendaController::class);
    Route::resource('photo', PhotoController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('galery', GaleryController::class);// routes/web.php
    Route::get('/galeri/{id}', [GaleryController::class, 'show'])->name('galery.show');
    Route::resource('users', UserController::class);
    Route::get('/', [VHomeController::class, 'index'])->name('welcome');
    Route::get('/', [VHomeController::class, 'showGalery'])->name('home');


       

});
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
require __DIR__.'/auth.php'; 
