<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;

class ProfileController extends Controller
{
    public function index($id)
    {
        return view('profile/client-profile', [
            'user' => User::find($id),
        ]);
    }

    public function adminpanel()
    {$doctor = User::with('doctor')
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
        
    }
}
