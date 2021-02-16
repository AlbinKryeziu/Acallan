<?php

namespace App\Http\Controllers;

use App\Models\ClientDoctor;
use App\Models\Event;
use App\Models\EventRequest;
use App\Models\GiftClient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class PacientController extends Controller
{
    public function doctor()
    {
        $doctorId = ClientDoctor::where('client_id', Auth::id())->pluck('doctor_id');
        $doctor = User::with('doctor')
            ->whereHas('role', function ($q) {
                $q->where('name', 'Doctor');
            })
            ->whereIn('id', $doctorId)
            ->get();

        return view('client/doctor', [
            'doctor' => $doctor,
        ]);
    }

    public function store()
    {
        $doctorID = ClientDoctor::where('client_id', Auth::id())->pluck('doctor_id');

        $doctor = User::with('doctor')
            ->whereHas('role', function ($q) {
                $q->where('name', 'Doctor');
            })
            ->whereNotIn('id', $doctorID)
            ->get();

        return view('client/add-doctor', [
            'doctor' => $doctor,
        ]);
    }

    public function addDoctor(Request $request)
    {
        ClientDoctor::create([
            'doctor_id' => $request->doctorId,
            'client_id' => Auth::id(),
        ]);
        return redirect()
            ->back()
            ->with('success', 'The doctor has been successfully added');
    }

    public function eventsByDoctor($doctorId)
    {
        $eventId = EventRequest::where('request_id', Auth::id())->pluck('event_id');
        if (count($eventId) >= 1) {
            $event = Event::with('user', 'requestEvent')
                ->where('user_id', $doctorId)
                ->whereNotIn('id', $eventId)
                ->get();
        } else {
            $event = Event::with('user', 'requestEvent')
                ->where('user_id', $doctorId)
                ->get();
        }

        $doctor = User::with('doctor')
            ->where('id', $doctorId)
            ->get();
        return view('client/events-doctor', [
            'doctor' => $doctor,
            'event' => $event,
        ]);
    }

    public function requestEvent(Request $request, $eventId)
    {
        $event = EventRequest::create([
            'request_id' => Auth::id(),
            'event_id' => $eventId,
            'status' => 0,
        ]);

        return redirect()
            ->back()
            ->with('success', 'The event was successfully sent');
    }

    public function eventStatus()
    {
        $event = EventRequest::with('event')
            ->where('request_id', Auth::id())
            ->get();

        return view('client/event', [
            'event' => $event,
        ]);
    }

    public function storeGift($doctorId)
    {
        $doctor = User::find($doctorId);
        return view('client/sent-gift', [
            'doctor' => $doctor,
        ]);
    }

    public function addGift(Request $request, $doctorId)
    {
        GiftClient::create([
            'links' => $request->links,
            'description' => $request->description,
            'doctor_id' => $doctorId,
            'client_id' => Auth::id(),
        ]);
        return redirect()
            ->back()
            ->with('success', 'The gift was successfully sent');
    }

    public function myGift()
    {
        $gift = GiftClient::with('doctor', 'client')->get();
        return view('client/gift', [
            'gift' => $gift,
        ]);
    }
}
