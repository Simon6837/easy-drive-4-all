<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\Owner\CarsController;
use App\Http\Controllers\Owner\NotificationsController;
use App\Http\Controllers\Owner\StudentController;
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
Route::get('/', function () {
    return view('/pages.website.home');
})->name('home');
Route::get('/home', function () {
    return view('/pages.website.home');
})->name('homepage');
Route::post('/signup', [HomeController::class, 'signup'])->name('signup');
Route::get('/our-cars', [CarController::class, 'index'])->name('cars');
Route::get('/about-us', function () {
    return view('/pages.website.aboutus');
})->name('aboutus');
Route::get('/services', function () {
    return view('/pages.website.services');
})->name('services');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'storeContactForm'])->name('contact.store');

//owner routes
Route::group(['middleware' => ['role:owner', 'auth', 'verified']], function () {
    //cars crud
    Route::get('/cars', [CarsController::class, 'index'])->name('carsindex');
    Route::get('/cars/create', [CarsController::class, 'create'])->name('carscreate');
    Route::get('/cars/edit/{id}', [CarsController::class, 'edit'])->name('carsedit');
    Route::post('/cars/store', [CarsController::class, 'store'])->name('carsstore');
    Route::post('/cars/update', [CarsController::class, 'update'])->name('carsupdate');
    Route::get('/cars/delete/{id}', [CarsController::class, 'destroy'])->name('carsdelete');

    Route::get('/students', [StudentController::class, 'index'])->name('studentindex');
    Route::get('/student/create', [StudentController::class, 'create'])->name('studentcreate');
    Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('studentedit');
    Route::post('/student/store', [StudentController::class, 'store'])->name('studentstore');
    Route::post('/student/update', [StudentController::class, 'update'])->name('studentupdate');
    Route::get('/student/delete/{id}', [StudentController::class, 'destroy'])->name('studentdelete');

//Notifications crud
    Route::get('/notifications', [NotificationsController::class, 'index'])->name('notificationsindex');
    Route::get('/notifications/create', [NotificationsController::class, 'create'])->name('notificationscreate');
    Route::get('/notifications/edit/{id}', [NotificationsController::class, 'edit'])->name('notificationsedit');
    Route::post('/notifications/store', [NotificationsController::class, 'store'])->name('notificationsstore');
    Route::post('/notifications/update', [NotificationsController::class, 'update'])->name('notificationsupdate');
    Route::get('/notifications/delete/{id}', [NotificationsController::class, 'destroy'])->name('notificationsdelete');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
