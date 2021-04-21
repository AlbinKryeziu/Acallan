<?php

use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\DoctorController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PacientController;
use App\Http\Controllers\MeetingController;
use App\Models\Event;
use Illuminate\Support\Carbon;
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
        return view('dashboard');
    })
    ->name('dashboard');
Route::get('redirects',[HomeController::class, 'redirects']);
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
Route::get('/events/request/event/{eventId}', [EventController::class, 'eventRequest']);
Route::post('/events/request/accept', [EventController::class, 'aceptEvent']);
Route::post('/events/request/rejected', [EventController::class, 'rejectetEevnt']);

Route::get('/user/profile/{id}', [ProfileController::class, 'index']);
Route::get('admin/dashboard', [ProfileController::class, 'adminpanel']);

Route::get('/formular/doctor', [DoctorController::class, 'formular']);
Route::post('/add/doctor', [DoctorController::class, 'addDoctor']);
Route::get('/doctor/view', [DoctorController::class, 'index']);
Route::get('/doctor/profile/{doctoId}', [DoctorController::class, 'profileDoctor']);

Route::get('/update/doctor/{doctorID}', [DoctorController::class, 'updateForm']);
Route::get('/admin/event', [DoctorController::class, 'event']);
Route::post('/update/doctor/admin/{doctorID}', [DoctorController::class, 'updateDoctor']);
Route::delete('/delete/doctor/{doctorID}', [DoctorController::class, 'deleteDoctor']);
Route::delete('/admin/delete/event/{eventId}', [DoctorController::class, 'deleteEvent']);
Route::get('/doctor/client', [DoctorController::class, 'doctorClients']);
Route::get('/doctor/gift/client/{ClientId}', [DoctorController::class, 'pacientGift']);
Route::get('/doctor/client/event/accepted/{ClientId}', [DoctorController::class, 'clientEventAccepted']);
Route::get('/doctor/today/event', [DoctorController::class, 'todayEvent']);

Route::get('/admin/client', [ClientController::class, 'index']);
Route::delete('/admin/delete/{clientId}', [ClientController::class, 'deleteClient']);
Route::get('/client/access/{userId}', [ClientController::class, 'storeAccess']);
Route::post('/client/access/doctor', [ClientController::class, 'accessDoctor']);
Route::get('/client/info/{clientId}', [ClientController::class, 'infoClient']);
Route::get('/client/profile/{clientId}', [ClientController::class, 'profileClient']);
Route::get('/client/evnts/{clientId}', [ClientController::class, 'eventClient']);
Route::get('/client/gift/{clientId}', [ClientController::class, 'giftClient']);
Route::delete('/client/delete/gift/{giftId}', [ClientController::class, 'deleteGIft']);
Route::get('/client/create/events/admin/{clientId}', [ClientController::class, 'creatEventAdmin']);
Route::post('/client/store/events/admin/', [ClientController::class, 'storeEventAdmin']);
Route::get('/admin/request/event/{eventId}', [ClientController::class, 'eventRequestAdmin']);
Route::delete('/delete/events/admin/{eventId}', [ClientController::class, 'adminDeleteEvent']);
Route::get('/edit/event/request/{eventId}', [ClientController::class, 'editEventRequest']);
Route::post('/edit/update/request/{eventId}', [ClientController::class, 'updateEventRequest']);

Route::get('/pacient/doctor', [PacientController::class, 'doctor']);
Route::get('/pacient/store', [PacientController::class, 'store']);
Route::post('/pacient/add/doctor', [PacientController::class, 'addDoctor']);
Route::get('/pacient/events/{doctorId}', [PacientController::class, 'eventsByDoctor']);
Route::post('/pacient/request', [PacientController::class, 'requestEvent']);
Route::get('/pacient/event', [PacientController::class, 'eventStatus']);
Route::get('/pacient/store/gift/{doctorId}', [PacientController::class, 'storeGift']);
Route::post('/pacient/store/addgift/{doctorId}', [PacientController::class, 'addGift']);
Route::get('/pacient/store/mygift', [PacientController::class, 'myGift']);

Route::post('createzoom', [ZoomController::class, 'store']);

Route::post('/meetings', [MeetingController::class, 'store']);

Route::group(['middleware' => ['manager']], function () {
    Route::post('follow/{clientId}', [ManagerController::class, 'follow']);
    Route::post('canelRequest/{clientId}', [ManagerController::class, 'canelRequest']);
    Route::post('unfollow/{clientId}', [ManagerController::class, 'unFollow']);
    Route::get('profile/{clientId}', [ManagerController::class, 'profileClient']);
    Route::get('employees', [ManagerController::class, 'index']);
    Route::get('follow/accepted', [ManagerController::class, 'followAccepted']);
    Route::get('doctors/{clientId}', [ManagerController::class, 'doctorClients']);
    Route::get('gift/{clientId}', [ManagerController::class, 'giftCient']);
    Route::get('meeting/{clientId}', [ManagerController::class, 'meetingClient']);
});
