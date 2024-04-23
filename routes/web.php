<?php

use App\Http\Controllers\BedrijfController;
use App\Http\Controllers\ContactsController;
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

/**
 * "Prefix" makes the route's have /contacten infront of them
 * "Group" makes it so that all routes will be grouped, have the auth middleware and have the prefix
 * "auth, verified" checks if I am the right user who is logged in, so no-one can be logged into myaccount by using the URL
 */
Route::prefix('contacten')->middleware(['auth', 'verified'])->group(function () {
    Route::get('', [ContactsController::class, 'index'])
        ->name('contacten');

    Route::post('', [ContactsController::class, 'store'])
        ->name('contacten.store');

    Route::get('/{contacts}/edit', [ContactsController::class, 'edit'])
        ->name('contacten.edit');

    Route::post('/{contacts}/edit', [ContactsController::class, 'editHandler'])
        ->name('contacten.editHandler');

    Route::delete('/{contacts}/destroy', [ContactsController::class, 'destroy'])
        ->name('contacten.destroy');
});

Route::prefix('bedrijven')->middleware(['auth', 'verified'])->group(function () {
    Route::get('', [BedrijfController::class, 'index'])
        ->name('bedrijven');

    Route::post('', [BedrijfController::class, 'store'])
        ->name('bedrijven.store');

    Route::get('/{company}/edit', [BedrijfController::class, 'edit'])
        ->name('bedrijven.edit');

    Route::post('/{company}/edit', [BedrijfController::class, 'editHandler'])
        ->name('bedrijven.editHandler');

    Route::delete('/{company}/destroy', [BedrijfController::class, 'deleteBedrijf'])
        ->name('bedrijven.destroy');
});

Route::get('/deals', function () {
    return view('deals');
})->middleware(['auth', 'verified'])->name('deals');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
