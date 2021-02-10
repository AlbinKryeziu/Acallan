<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function formular(){

        return view('admin/doctor');
    }

    public function addDoctor(Request $request){
     $doctor = User::create([
     'email' => $request->email,
     'name' => $request->name,
     'password' => Hash::make($request->password),
     ]);

     if($doctor){
         $doctor->role()->attach(2);
     }
     return redirect()->back();

    }

    public function index(){
        $doctor = User::whereHas('role', function($q) {
            $q->where('name','Doctor');
         })->get();
       
       
        return view('admin/view-doctor',[
            'doctor' => $doctor,
        ]);
    }


}
