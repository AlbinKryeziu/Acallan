<?php

namespace App\Http\Controllers;

use App\Http\Controllers\admin\DoctorController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\ManagerController;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
    public function redirects()
    {
        if(Auth::user()->hasRole('admin')){
            return redirect()->action([ProfileController::class, 'adminpanel']);
        }elseif (Auth::user()->hasRole('doc')) {
            $date = Carbon::today()->toDateTimeString();
            $event = Event::with([
                'requestEvent' => function ($q) {
                    $q->where('status', 1);
                },
        ])
                ->where('user_id', Auth::id())
                ->whereDate('start', $date)
                ->where('status', 1)
                ->get();
            return view('dashboard',[
                'event' =>$event
            ]);
        }elseif (Auth::user()->hasRole('client')) {
            return redirect()->action([PacientController::class,'doctor']);
        }
        elseif (Auth::user()->hasRole('manager')) {
            return redirect()->action([ManagerController::class, 'index']);
        }
    
    }
}
