<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
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

        return view('menagers/profile', [
            'user' => $user,
        ]);
    }
}
