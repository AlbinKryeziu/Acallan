<?php

namespace App\Http\Controllers\admin;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    public function index()
    {
        
        if (Auth::user()->isAdmin()) {
            $doctor = User::with('doctor')->whereHas('role', function ($q) {
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

            $doctorProfile = new Doctor();
            $doctorProfile->name = $request->name;
            $doctorProfile->birthday = $request->birthday;
            $doctorProfile->specialty = $request->specialty;
            $doctorProfile->work_address = $request->work_address;
            $doctorProfile->email = $request->email;
            $doctorProfile->remark = $request->remark;
            $doctorProfile->user_id = $doctor->id;
            $doctorProfile->save();

            Mail::to($request->email)->send(new WelcomeMail($data));
        }

        return redirect()
            ->back()
            ->with('message', 'The doctor has created successfully');
    }
}
