<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Owner\PDFController;
use App\Http\Controllers\Instructor\AbsenceController;
use App\Http\Controllers\Owner\CarsController;
use App\Http\Controllers\Lesson\LessonController;
use App\Http\Controllers\Owner\StudentController;
use App\Http\Controllers\owner\InstructorController;
use App\Http\Controllers\Owner\NotificationsController;
use App\Http\Controllers\Owner\TextController;

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
Route::get('/about-us', [AboutUsController::class, 'index'])->name('aboutus');
//contact page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendContactMail'])->name('contactsend');

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
    //Text table and edit
    Route::get('texts', [TextController::class, 'index'])->name('textindex');
    Route::get('text/edit/{id}', [TextController::class, 'edit'])->name('textedit');
    Route::post('text/update', [TextController::class, 'update'])->name('textupdate');
    //Ziekmeldingen
    Route::get('/absence/owner', [AbsenceController::class, 'ownerIndex'])->name('allabsence');
});

// Instructor role
Route::group(['middleware' => ['role:instructor', 'auth', 'verified']], function () {
    //Ziekmeldingen
    Route::get('/absence/active', [AbsenceController::class, 'active'])->name('activeabsences');
    Route::get('/absence/create', [AbsenceController::class, 'create'])->name('absencecreate');
    Route::get('/absence/edit/{id}', [AbsenceController::class, 'edit'])->name('absenceedit');
    Route::post('/absence/store', [AbsenceController::class, 'store'])->name('absencestore');
    Route::post('/absence/update', [AbsenceController::class, 'update'])->name('absenceupdate');
});

//Instructors routes
Route::group(['middleware' => ['role:instructor', 'auth', 'verified']], function () {
//idk what this does so i won't delete it
    // Route::get('/lesson/edit/{id}', [LessonController::class, 'edit'])->name('lessonedit');
    // Route::post('/lesson/store', [LessonController::class, 'store'])->name('lessonstore');
    // Route::post('/lesson/update', [LessonController::class, 'update'])->name('lessonupdate');
    // Route::get('/lesson/delete/{id}', [LessonController::class, 'destroy'])->name('lessondelete');

    //Notifications crud
    Route::get('/notifications/all', [NotificationsController::class, 'index'])->name('notificationsindex');
    Route::get('/notifications/create', [NotificationsController::class, 'create'])->name('notificationscreate');
    Route::get('/notifications/edit/{id}', [NotificationsController::class, 'edit'])->name('notificationsedit');
    Route::post('/notifications/store', [NotificationsController::class, 'store'])->name('notificationsstore');
    Route::post('/notifications/update', [NotificationsController::class, 'update'])->name('notificationsupdate');
    Route::get('/notifications/delete/{id}', [NotificationsController::class, 'destroy'])->name('notificationsdelete');
});

//All users routes
Route::group(['middleware' => ['role:owner|instructor|student', 'auth', 'verified']], function () {

    //Lesson crud
    Route::get('/lessons', [LessonController::class, 'index'])->name('lessonindex');
    Route::get('/lessons/option', [LessonController::class, 'option'])->name('lesson.option');
    Route::post('/lessons/option', [LessonController::class, 'option'])->name('lesson.option');
});

//Get notification per role
Route::get('/notifications', [NotificationsController::class, 'getFromRole'])->name('notifications');
//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
//Profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware(['role:student|instructor', 'auth'])->name('profile');

//Auth routes
require __DIR__ . '/auth.php';
