<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index($id)
    {
        return view('profile/client-profile', [
            'user' => User::find($id),
        ]);
    }

    public function adminpanel()
    {
        return view('admin/dashboard');
    }
}
