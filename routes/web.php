<?php

use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\DoctorController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PacientController;
use App\Models\Event;
use App\Models\User;
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

// Route::redirect('/', '/en');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', function () {
        if (Auth::user()->hasRole('admin')) {
            $doctor = User::with('doctor')
                ->whereHas('role', function ($q) {
                    $q->where('name', 'Doctor');
                })
                ->get();
            $client = User::with('doctor')
                ->whereHas('role', function ($q) {
                    $q->where('name', 'client');
                })
                ->get();
            $doctor = User::with('doctor')
                ->whereHas('role', function ($q) {
                    $q->where('name', 'Doctor');
                })
                ->get();
            $event = Event::all();
            return view('admin/dashboard', [
                'doctor' => $doctor,
                'client' => $client,
                'event' => $event,
            ]);
        } elseif (Auth::user()->hasRole('doc')) {
            return view('dashboard');
        }elseif (Auth::user()->hasRole('client')) {
            return view('client/dashboard');
        }
    })
    ->name('dashboard');

Route::get('/', function () {
    return view('home');
});
Route::get('/how-it-works', function () {
    return view('how-it-works');
});
Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('fullcalender', [FullCalendarController::class, 'index']);
Route::get('/contact-us', [SendEmailController::class, 'index']);
Route::post('/contact-us/send', [SendEmailController::class, 'send']);

Route::get('lang/{locale}', [HomeController::class, 'lang']);

Route::post('/fullcalendareventmaster/create', [FullCalendarController::class, 'create']);
Route::post('/fullcalendareventmaster/update', [FullCalendarController::class, 'update']);
Route::post('/fullcalendareventmaster/delete', [FullCalendarController::class, 'destroy']);

Route::delete('/events/delete/{eventId}', [EventController::class, 'delete']);
Route::get('/events/doctor', [EventController::class, 'index']);
Route::get('/events/editEvent/{eventId}', [EventController::class, 'editEvent']);
Route::post('/events/update/{eventId}', [EventController::class, 'updateEvent']);

Route::get('/user/profile/{id}', [ProfileController::class, 'index']);
Route::get('/dashboard/user', [ProfileController::class, 'adminpanel']);

Route::get('/formular/doctor', [DoctorController::class, 'formular']);
Route::post('/add/doctor', [DoctorController::class, 'addDoctor']);
Route::get('/doctor/view', [DoctorController::class, 'index']);
Route::get('/doctor/profile/{doctoId}', [DoctorController::class, 'profileDoctor']);

Route::get('/update/doctor/{doctorID}', [DoctorController::class, 'updateForm']);
Route::get('/admin/event', [DoctorController::class, 'event']);
Route::post('/update/doctor/admin/{doctorID}', [DoctorController::class, 'updateDoctor']);
Route::delete('/delete/doctor/{doctorID}', [DoctorController::class, 'deleteDoctor']);
Route::delete('/admin/delete/event/{eventId}', [DoctorController::class, 'deleteEvent']);

Route::get('/admin/client', [ClientController::class, 'index']);
Route::delete('/admin/delete/{clientId}', [ClientController::class, 'deleteClient']);


Route::get('/pacient/doctor', [PacientController::class,'doctor']);
Route::get('/pacient/store', [PacientController::class,'store']);
Route::post('/pacient/add/doctor', [PacientController::class,'addDoctor']);
Route::get('/pacient/events/{doctorId}', [PacientController::class,'eventsByDoctor']);
Route::post('/pacient/request/{eventId}', [PacientController::class,'requestEvent']);
Route::get('/pacient/event', [PacientController::class,'eventStatus']);



