<?php

namespace App\Http\Controllers\admin;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Models\ClientDoctor;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\EventRequest;
use App\Models\GiftClient;
use App\Models\Specialty;
use Carbon\Carbon;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $doctors = User::with('doctor')->whereHas('role', function ($q) {
                $q->where('name', 'Doctor');
            });

            if (request()->has('q')) {
                $doctors = User::with('doctor')
                    ->whereHas('role', function ($q) {
                        $q->where('name', 'Doctor');
                    })
                    ->where('name', 'LIKE', '%' . request()->get('q') . '%');
            }

            return view('admin/view-doctor', [
                'doctors' => $doctors->paginate(10),
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

    public function addDoctor(DoctorRequest $request)
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
            $doctorProfile = new Doctor();
            $doctorProfile->name = $request->name;
            $doctorProfile->birthday = $request->birthday;
            $doctorProfile->specialty_id = $request->specialitizy;
            $doctorProfile->work_address = $request->work_address;
            $doctorProfile->email = $request->email;
            $doctorProfile->remark = $request->remark;
            $doctorProfile->user_id = $doctor->id;
            $doctorProfile->id_doctor = $request->id_doctor;
            $doctorProfile->pin = $request->pin;
            $doctorProfile->save();

            $data = [
                'name' => $request->name,
                'password' => $password,
                'email' => $request->email,
            ];

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
        $events = Event::with('user');
        if (request()->has('q')) {
            $events = Event::with('user')->where('title', 'LIKE', '%' . request()->get('q') . '%');
        }

        return view('admin/event/event', [
            'events' => $events->paginate(15),
        ]);
    }
    public function deleteEvent($eventId)
    {
        return 'ok';
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

    public function profileDoctor($doctorId)
    {
        $doctor = User::with('event', 'doctor')
            ->where('id', $doctorId)
            ->get();

        return view('admin/profile-doctor', [
            'doctor' => $doctor,
        ]);
    }
    public function doctorClients()
    {
        $client = ClientDoctor::with('client')->where('doctor_id', Auth::id());
        return view('doctor/client', [
            'client' => $client->paginate(10),
        ]);
    }

    public function pacientGift($clientId)
    {
        $client = User::where('id', $clientId)->get();
        $gifts = GiftClient::where('client_id', $clientId)->where('doctor_id', Auth::id());
        return view('doctor/gift', [
            'client' => $client,
            'gifts' => $gifts->paginate(10),
        ]);
    }
    public function clientEventAccepted($clientId)
    {
        $acceptedRequest = EventRequest::where('request_id', $clientId)
            ->where('status', 1)
            ->pluck('event_id');
        $event = Event::where('user_id', Auth::id())
            ->whereIn('id', $acceptedRequest)
            ->get();
        $name = EventRequest::where('request_id', $clientId)->first();
        return view('doctor/event-with-client', [
            'event' => $event,
            'name' => $name,
        ]);
    }
    public function todayEvent()
    {
        $date = Carbon::today()->toDateTimeString();
        $event = Event::with([
            'requestEvent' => function ($q) {
                $q->where('status', 1);
            },
        ])
            ->where('user_id', Auth::id())
            ->whereDate('start', $date)
            ->where('status', 1)
            ->get();
        return view('vendor/jetstream/components/welcome', [
            'event' => $event,
        ]);
    }
}
