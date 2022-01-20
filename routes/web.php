<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Owner\CarsController;
use App\Http\Controllers\owner\InstructorController;
use App\Http\Controllers\Owner\NotificationsController;
use App\Http\Controllers\Owner\PDFController;
use App\Http\Controllers\Owner\StudentController;
use App\Http\Controllers\ProfileController;
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

//Website routes
//home page
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', function () {
    return redirect(route('home'));
})->name('homepage');
//signup request
Route::post('/signup', [HomeController::class, 'signup'])->name('signup');
//info pages
Route::get('/our-cars', [CarController::class, 'index'])->name('cars');
Route::get('/about-us', function () {
    return view('/pages.website.aboutus');
})->name('aboutus');
Route::get('/services', function () {
    return view('/pages.website.services');
})->name('services');
//contact page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'storeContactForm'])->name('contact.store');

//Owner routes
Route::group(['middleware' => ['role:owner', 'auth', 'verified']], function () {
    //Cars crud
    Route::get('/cars', [CarsController::class, 'index'])->name('carsindex');
    Route::get('/cars/create', [CarsController::class, 'create'])->name('carscreate');
    Route::get('/cars/edit/{id}', [CarsController::class, 'edit'])->name('carsedit');
    Route::post('/cars/store', [CarsController::class, 'store'])->name('carsstore');
    Route::post('/cars/update', [CarsController::class, 'update'])->name('carsupdate');
    Route::get('/cars/delete/{id}', [CarsController::class, 'destroy'])->name('carsdelete');
    //Students crud
    Route::get('/students', [StudentController::class, 'index'])->name('studentindex');
    Route::get('/student/create', [StudentController::class, 'create'])->name('studentcreate');
    Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('studentedit');
    Route::post('/student/store', [StudentController::class, 'store'])->name('studentstore');
    Route::post('/student/update', [StudentController::class, 'update'])->name('studentupdate');
    Route::get('/student/delete/{id}', [StudentController::class, 'destroy'])->name('studentdelete');
    //instructors crud
    Route::get('/instructors', [InstructorController::class, 'index'])->name('instructorsindex');
    Route::get('/instructor/create', [InstructorController::class, 'create'])->name('instructorcreate');
    Route::get('/instructor/edit/{id}', [InstructorController::class, 'edit'])->name('instructoredit');
    Route::post('/instructor/store', [InstructorController::class, 'store'])->name('instructorstore');
    Route::post('/instructor/update', [InstructorController::class, 'update'])->name('instructorupdate');
    Route::get('/instructor/delete/{id}', [InstructorController::class, 'destroy'])->name('instructordelete');
    //Notifications crud
    Route::get('/notifications/all', [NotificationsController::class, 'index'])->name('notificationsindex');
    Route::get('/notifications/create', [NotificationsController::class, 'create'])->name('notificationscreate');
    Route::get('/notifications/edit/{id}', [NotificationsController::class, 'edit'])->name('notificationsedit');
    Route::post('/notifications/store', [NotificationsController::class, 'store'])->name('notificationsstore');
    Route::post('/notifications/update', [NotificationsController::class, 'update'])->name('notificationsupdate');
    Route::get('/notifications/delete/{id}', [NotificationsController::class, 'destroy'])->name('notificationsdelete');
    //pdf export
    Route::get('generate-cars', [PDFController::class, 'generateCarsPDF'])->name('generatecars');
    Route::get('generate-instructors', [PDFController::class, 'generateInstructorsPDF'])->name('generateinstructors');
    Route::get('generate-students', [PDFController::class, 'generateStudentsPDF'])->name('generatestudents');
});

//Get notification per role
Route::get('/notifications', [NotificationsController::class, 'getFromRole'])->name('notifications');
//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
//Profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware(['role:student|instructor', 'auth'])->name('profile');
//Auth routes
require __DIR__ . '/auth.php';
