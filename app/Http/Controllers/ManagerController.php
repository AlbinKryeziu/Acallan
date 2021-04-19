<?php

namespace App\Http\Controllers;

use App\Models\Follow;
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
}
