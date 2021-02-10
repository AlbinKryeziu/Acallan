<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{
    public function index()
    {
        return view('events/events', [
            'events' => Event::where('user_id',Auth::id())->get(),
        ]);
    }
}
