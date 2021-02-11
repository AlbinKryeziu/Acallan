<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class DoctorController extends Controller
{
    public function index()
    {
        if (Atuh::user()->isAdmin()) {
            $doctor = User::whereHas('role', function ($q) {
                $q->where('name', 'Doctor');
            })->get();

            return view('admin/view-doctor', [
                'doctor' => $doctor,
            ]);
        }
        return redirect()->back();
    }
    public function formular()
    {
        if (Auth::user()->isAdmin()) {
            return view('admin/doctor');
        }
        return redirect()->back();
    }

    public function addDoctor(Request $request)
    {
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 10);

        $doctor = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($password),
        ]);
        if ($doctor) {
            $doctor->role()->attach(2);

            $data = [
                'name' => $request->name,
                'password' => $password,
                'email' => $request->email,
            ];

            Mail::to($request->email)->send(new WelcomeMail($data));
        }

        return redirect()
            ->back()
            ->with('message', 'The doctor has created successfully');
    }
}
