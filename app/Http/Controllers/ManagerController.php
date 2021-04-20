<?php

namespace App\Http\Controllers;

use App\Models\ClientDoctor;
use App\Models\Doctor;
use App\Models\Follow;
use App\Models\GiftClient;
use App\Models\User;
use App\Models\ZoomMeeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::with('role')->whereHas('role', function ($q) {
            $q->where('name', 'Client');
        });
        if (request()->has('q')) {
            $users = User::with('role')
                ->whereHas('role', function ($q) {
                    $q->where('name', 'Client');
                })
                ->where('name', 'LIKE', '%' . request()->get('q') . '%');
        }
        return view('menagers/index', [
            'users' => $users->paginate(30),
        ]);
    }
    public function follow($clientId)
    {
        $follow = Auth::user()
            ->follow()
            ->create(['client_id' => $clientId, 'status' => Follow::Request]);
        if ($follow) {
            return back();
        }
    }
    public function canelRequest($clientId)
    {
        $follow = Auth::user()
            ->follow()
            ->where('client_id', $clientId)
            ->delete();
        if ($follow) {
            return back();
        }
    }
    public function unFollow($clientId)
    {
        $follow = Auth::user()
            ->follow()
            ->where('client_id', $clientId)
            ->delete();
        if ($follow) {
            return back();
        }
    }
    public function profileClient($clientId)
    {
        $user = User::findOrFail($clientId);
        $doctors = ClientDoctor::where('client_id', $user->id)->count();
        $gifts = GiftClient::where('client_id', $user->id)->count();
        $metting = ZoomMeeting::where('request_id', $user->id)->count();
        return view('menagers/profile', [
            'user' => $user,
            'doctors' => $doctors,
            'gifts' => $gifts,
            'meeting' => $metting,
        ]);
    }
}
