<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\ProfileController;

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

Route::get('/fullcalendar', [FullCalendarController::class, 'index']);
Route::post('/fullcalendar/create', [FullCalendarController::class, 'create']);
Route::post('/fullcalendar/update', [FullCalendarController::class, 'update']);
Route::post('/fullcalendar/delete', [FullCalendarController::class, 'destroy']);

Route::get('/events', [EventController::class, 'index']);
Route::get('/user/profile/{id}', [ProfileController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

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
