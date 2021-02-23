<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ClientDoctor;
use App\Models\Doctor;
use App\Models\EventRequest;
use App\Models\Specialty;
use App\Models\User;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Util\Json;

class ClientController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $client = User::whereHas('role', function ($q) {
                $q->where('name', 'Client');
            })->get();
            if (request()->has('q')) {
                $client = User::whereHas('role', function ($q) {
                    $q->where('name', 'Client');
                })->where('name', 'LIKE', '%' . request()->get('q') . '%')->get();
            }

            return view('admin/client/client', [
                'client' => $client,
            ]);
        }
        return redirect()->back();
    }
    public function deleteClient($clientId)
    {
        $client = User::where('id', $clientId)->delete();
        return redirect()
            ->back()
            ->with('success', 'The client has been successfully deleted');
    }
    public function storeAccess($userId)
    {
        $user = User::where('id', $userId)->first();
        $acces = User::where('id', $userId)
            ->pluck('doctor_access')
            ->toArray();

        $speciality = Specialty::get();
        return view('admin/client/access', [
            'user' => $user,
            'speciality' => $speciality,
            'acces' => $acces,
        ]);
    }
    public function accessDoctor(Request $request)
    {
        $userId = $request->userId;
        $user = User::where('id', $request->userId)->update([
            'doctor_access' => [$request->speciality],
        ]);

        if ($user) {
            $accesUser = User::where('id', $userId)
                ->pluck('doctor_access')
                ->toArray();
            $doctor = Doctor::with('user')
                ->whereIn('specialty_id', $accesUser[0][0])
                ->pluck('user_id');
            $doctor = ClientDoctor::where('client_id', $userId)
                ->whereNotIn('doctor_id', $doctor)
                ->delete();
        }
    }

    public function infoClient($clientId)
    {
        $client = User::where('id', $clientId)->first();
        return view('admin/client/info', [
            'client' => $client,
        ]);
    }

    public function profileClient($clientId)
    {
        $client = User::where('id', $clientId)->get();
        $speaciltyId = User::where('id', $clientId)->pluck('doctor_access');
        $acces = Specialty::whereIn('id', $speaciltyId)->get();
        return view('admin/client/profile', [
            'client' => $client,
            'acces' => $acces,
        ]);
    }
    public function eventClient($clientId)
    {
        $events = EventRequest::with('event')
            ->where('request_id', $clientId)
            ->get();

        if (request()->has('q')) {
            $events = EventRequest::with('event')
                ->whereHas('event', function ($q) {
                    $q->where('title', 'LIKE', '%' . request()->get('q') . '%');
                })
                ->where('request_id', $clientId)
                ->get();
        }

        return view('admin/client/events', [
            'events' => $events,
        ]);
    }
}
