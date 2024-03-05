<?php

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

Route::get('/contacten', function () {
    return view('contacten');
})->middleware(['auth', 'verified'])->name('contacten');

Route::get('/contacten/contactform', function () {
    return view('contactform');
})->middleware(['auth', 'verified'])->name('contacten.contactform');

Route::post('/contacten',[ContactsController::class, 'store'], function () {
    return view('contacten');
})->middleware(['auth', 'verified'])->name('contacten.store');

Route::get('/bedrijven', function () {
    return view('bedrijven');
})->middleware(['auth', 'verified'])->name('bedrijven');

Route::get('/deals', function () {
    return view('deals');
})->middleware(['auth', 'verified'])->name('deals');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
