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
use App\Models\Event;
use App\Models\Specialty;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $doctor = User::with('doctor')
                ->whereHas('role', function ($q) {
                    $q->where('name', 'Doctor');
                })
                ->get();

            return view('admin/view-doctor', [
                'doctor' => $doctor,
            ]);
        }
        return redirect()->back();
    }
    public function formular()
    {
        $specializity = Specialty::get();
        if (Auth::user()->isAdmin()) {
            return view('admin/doctor', [
                'specializity' => $specializity,
            ]);
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
            ->with('success', 'The doctor has been successfully created');
    }

    public function deleteDoctor($doctorId)
    {
        $doctor = User::where('id', $doctorId)->delete();
        if ($doctor) {
            Doctor::where('user_id', $doctorId)->delete();
        }
        if ($doctor) {
            return redirect()
                ->back()
                ->with('success', 'The doctor has been successfully deleted');
        }
    }

    public function updateForm($doctorId)
    {
        $doctor = User::with('doctor')
            ->whereHas('role', function ($q) {
                $q->where('name', 'Doctor');
            })
            ->find($doctorId);
        $specialitizy = Specialty::get();
        return view('admin/edit-doctor', [
            'doctor' => $doctor,
            'specializity' => $specialitizy,
        ]);
    }

    public function updateDoctor(Request $request, $doctorId)
    {
        $user = User::find($doctorId);

        if ($user->email !== $request->email || $user->name !== $request->name) {
            $updateprofile = User::where('id', $doctorId)->update([
                'email' => $request->email,
                'name' => $request->name,
            ]);
        }
        $updateDoctor = Doctor::where('user_id', $doctorId)->update([
            'name' => $request->name,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'work_address' => $request->work_address,
            'remark' => $request->remark,
            'specialty' => $request->specialty,
        ]);
        if ($updateDoctor) {
            return redirect()
                ->back()
                ->with('success', 'The doctor has been successfully updated');
        }
    }

    public function event()
    {
        $event = Event::with('user')->get();

        return view('admin/event/event', [
            'event' => $event,
        ]);
    }
    public function deleteEvent($eventId)
    {
        $event = Event::find($eventId);
        $event->delete();
        if ($event) {
            return redirect()
                ->back()
                ->with('success', 'Event has been deleted successfully');
        }
        return redirect()
            ->back()
            ->with('error', 'Something went wrong');
    }
}
