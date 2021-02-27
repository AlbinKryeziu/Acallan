<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ClientDoctor;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\EventRequest;
use App\Models\GiftClient;
use App\Models\Specialty;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Util\Json;
use Symfony\Component\HttpKernel\Event\RequestEvent;

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
                })
                    ->where('name', 'LIKE', '%' . request()->get('q') . '%')
                    ->get();
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
        $access = User::where('id', $userId)
            ->pluck('doctor_access')
            ->toArray();
        $activeAccess = Specialty::whereIn('id', $access[0][0])->get();
        $speciality = Specialty::get();
        return view('admin/client/access', [
            'user' => $user,
            'speciality' => $speciality,
            'activeAccess' => $activeAccess,
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
            $doctors = ClientDoctor::where('client_id', $userId)
                ->whereNotIn('doctor_id', $doctor)
                ->delete();
        }
        return redirect()
            ->back()
            ->with('success', 'The access process was completed successfully');
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
        $acces = Specialty::whereIn('id', $speaciltyId[0][0])->get();
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

    public function giftClient($clientId)
    {
        $client = User::findOrFail($clientId);
        $gift = GiftClient::where('client_id', $clientId)->get();
        return view('admin/client/client-gift', [
            'gift' => $gift,
            'client' => $client,
        ]);
    }

    public function deleteGIft($giftId)
    {
        $deleteGift = GiftClient::findOrFail($giftId);
        $deleteGift->delete();
        if ($deleteGift) {
            return redirect()
                ->back()
                ->with('success', 'The gift has been successfully deleted');
        }
    }

    public function creatEventAdmin(Request $request, $clientId)
    {
        $client = User::findOrFail($clientId);
        $accessClient = User::where('id', $clientId)
            ->pluck('doctor_access')
            ->toArray();
        $doctorSpeciality = Doctor::with('user')
            ->whereIn('specialty_id', $accessClient[0][0])
            ->pluck('user_id');
        $doctor = User::whereIn('id', $doctorSpeciality)->get();
        return view('admin/client/create-events', [
            'client' => $client,
            'doctor' => $doctor,
        ]);
    }
    public function storeEventAdmin(Request $request)
    {
        $clientId = $request->clientId;
        $doctorId = $request->doctorId;
        $start = Carbon::parse($request->start)->format('Y-m-d H:i:s');
        $end = Carbon::parse($request->end)->format('Y-m-d H:i:s');

        $checkEventbyDoctor = Event::where('user_id', $doctorId)
            ->whereBetween('start', [$start, $end])
            ->whereBetween('end', [$start, $end])
            ->get();
        $eventClient = EventRequest::where('request_id', $clientId)->pluck('event_id');
        $checkEventByClient = Event::whereIn('id', $eventClient)
            ->whereBetween('start', [$start, $end])
            ->whereBetween('end', [$start, $end])
            ->get();
        if (!$checkEventbyDoctor->isEmpty() || !$checkEventByClient->isEmpty()) {
            return redirect()
                ->back()
                ->with('warning', 'There is an event for this date please choose another date');
        }
        $createEventDoctor = new Event();
        $createEventDoctor->title = $request->event;
        $createEventDoctor->start = $request->start;
        $createEventDoctor->end = $request->end;
        $createEventDoctor->user_id = $request->doctorId;
        $createEventDoctor->status = Event::Accepted;
        $createEventDoctor->save();
        if ($createEventDoctor) {
            $createRequstEvent = new EventRequest();
            $createRequstEvent->request_id = $clientId;
            $createRequstEvent->event_id = $createEventDoctor->id;
            $createRequstEvent->status = EventRequest::Accepted;
            $createRequstEvent->save();
        }
        if ($createEventDoctor || $createRequstEvent) {
            return redirect()
                ->back()
                ->with('success', 'The event was successfully created');
        }
    }

    public function eventRequestAdmin($eventId){
   
         $events = Event::where('id',$eventId)->get();
         $eventRequest = EventRequest::with('requestClient')->where('event_id',$eventId);
         if (request()->has('q')) {
           $eventRequest = EventRequest::with('event')
                ->whereHas('event', function ($q) {
                    $q->where('title', 'LIKE', '%' . request()->get('q') . '%');
                })
                ->where('event_id', $eventId);
        }
        return view('admin/event/request',[
            'events' => $events,
            'eventRequest' => $eventRequest->paginate(1),
        ]);
    }
}
