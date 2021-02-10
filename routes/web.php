<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\ProfileController;
use Illuminate\Contracts\Session\Session;

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

Route::redirect('/', '/en');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    if(Auth::user()->hasRole('admin')){
        return view('admin/dashboard');
    } elseif(Auth::user()->hasRole('doc')){
        return view('dashboard');
    }
   
})->name('dashboard');

Route::get('fullcalender', [FullCalendarController::class, 'index']);

Route::post('/fullcalendareventmaster/create',[FullCalendarController::class,'create']);
Route::post('/fullcalendareventmaster/update',[FullCalendarController::class,'update']);
Route::post('/fullcalendareventmaster/delete',[FullCalendarController::class,'destroy']);


Route::get('/events', [EventController::class, 'index']);
Route::get('/user/profile/{id}', [ProfileController::class, 'index']);

Route::get('/dashboard/user', [ProfileController::class, 'adminpanel']);

Route::get('/formular/doctor', [DoctorController::class, 'formular']);
Route::post('/add/doctor', [DoctorController::class, 'addDoctor']);
Route::get('/doctor/view', [DoctorController::class, 'index']);







Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/how-it-works', function () {
    return view('how-it-works');
});

Route::get('/contact-us', [SendEmailController::class, 'index']);
Route::post('/contact-us/send', [SendEmailController::class, 'send']);

Route::prefix('{language}')->group(function () {
    Route::get('/', function () {
        return view('home');
    });
   
   
});



