<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\BedrijfController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::prefix('contacten')->middleware(['auth', 'verified'])->group(function() {
    Route::get('', [ContactsController::class, 'index'])
        ->name('contacten');

    Route::post('',[ContactsController::class, 'store'])
        ->name('contacten.store');

    Route::get('/{contacts}/edit',[ContactsController::class, 'edit'])
        ->name('contacten.edit');

    Route::get('/{contacts}/destroy',[ContactsController::class, 'destroy'])
        ->name('contacten.destroy');
});

Route::get('/bedrijven', [BedrijfController::class, 'indexB'])->middleware(['auth', 'verified'])->name('bedrijven');
Route::post('/bedrijven',[BedrijfController::class, 'store'])->middleware(['auth', 'verified'])->name('bedrijven.store');

// Route::get('/bedrijven', function () {
//     return view('bedrijven');
// })->middleware(['auth', 'verified'])->name('bedrijven');

// Route::post('/bedrijven',[BedrijfController::class, 'store'], function () {
//     return view('bedrijven');
// })->middleware(['auth', 'verified'])->name('bedrijven.store');

Route::get('/deals', function () {
    return view('deals');
})->middleware(['auth', 'verified'])->name('deals');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
