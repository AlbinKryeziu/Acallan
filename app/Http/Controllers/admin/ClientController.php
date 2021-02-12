<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ClientController extends Controller
{
    public function index(){

        if (Auth::user()->isAdmin()) {
            $client = User::whereHas('role', function ($q) {
                $q->where('name', 'Client');
            })->get();

            return view('admin/client/client', [
                'client' => $client,
            ]);
        }
        return redirect()->back();
    }
}
