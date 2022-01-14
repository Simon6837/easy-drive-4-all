<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/', function () { return view('/pages.website.home');})->name('home');
Route::get('/home', function () { return view('/pages.website.home');})->name('homepage');
Route::get('/autos', function () { return view('/pages.website.cars');})->name('cars');
Route::get('/over-ons', function () { return view('/pages.website.aboutus');})->name('aboutus');
Route::get('/diensten', function () { return view('/pages.website.services');})->name('services');

Route::get('/contact', [ContactController::class, 'index'])->name('contact'); 
Route::post('/contact', [ContactController::class, 'storeContactForm'])->name('contact.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
