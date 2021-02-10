<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id)
    {
        return view('profile/client-profile', [
            'user' => User::find($id)
        ]);
    }

    public function adminpanel(){

        return view('admin/dashboard');
    }
}