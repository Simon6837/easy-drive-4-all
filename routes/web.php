<?php

use App\Http\Controllers\Owner\CarsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;

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

//Website
Route::get('/', function () { return view('/pages.website.home');})->name('home');
Route::get('/home', function () { return view('/pages.website.home');})->name('homepage');
Route::post('/signup', [HomeController::class, 'signup'])->name('signup');
Route::get('/autos', function () { return view('/pages.website.cars');})->name('cars');
Route::get('/over-ons', function () { return view('/pages.website.aboutus');})->name('aboutus');
Route::get('/diensten', function () { return view('/pages.website.services');})->name('services');

Route::get('/contact', [ContactController::class, 'index'])->name('contact'); 
Route::post('/contact', [ContactController::class, 'storeContactForm'])->name('contact.store');

//cars crud
Route::get('/cars', [CarsController::class, 'index'])->name('carsindex');
Route::get('/cars/create', [CarsController::class, 'create'])->name('carscreate');
Route::get('/cars/edit/{id}', [CarsController::class, 'edit'])->name('carsedit');
Route::post('/cars/store', [CarsController::class, 'store'])->name('carsstore');
Route::post('/cars/update', [CarsController::class, 'update'])->name('carsupdate');
Route::get('/cars/delete/{id}', [CarsController::class, 'destroy'])->name('carsdelete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
