<?php

namespace App\Http\Controllers;

use App\Http\Requests\GiftRequest;
use App\Models\ClientDoctor;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\EventRequest;
use App\Models\GiftClient;
use App\Models\User;
use Carbon\Carbon;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class PacientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function doctor()
    {
        $doctorId = ClientDoctor::where('client_id', Auth::id())->pluck('doctor_id');
        $user = User::findOrFail(Auth::id());
        $doctors = User::with('doctor')
            ->whereHas('role', function ($q) {
                $q->where('name', 'Doctor');
            })
            ->whereIn('id', $doctorId);

        return view('client/doctor', [
            'doctors' => $doctors->paginate(10),
            'user' => $user,
        ]);
    }

    public function store()
    {
        $doctorID = ClientDoctor::where('client_id', Auth::id())->pluck('doctor_id');

        $accesUser = User::where('id', Auth::id())
            ->pluck('doctor_access')
            ->toArray();

        $doctor = Doctor::with('user')
            ->whereIn('specialty_id', $accesUser[0][0])
            ->whereNotIn('user_id', $doctorID)
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
                ->where('status', 0)
                ->get();
        } else {
            $event = Event::with('user', 'requestEvent')
                ->where('user_id', $doctorId)
                ->where('status', 0)
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

    public function requestEvent(Request $request)
    {
        $eventId = $request->eventId;
        $event = EventRequest::create([
            'request_id' => Auth::id(),
            'event_id' => $eventId,
            'status' => EventRequest::Sent,
            'product' => $request->product,
            'article' => $request->article,
        ]);

        return redirect()
            ->back()
            ->with('success', 'The event was successfully sent');
    }

    public function eventStatus()
    {
        $events = EventRequest::with('event')->where('request_id', Auth::id());
        return view('client/event', [
            'events' => $events->paginate(10),
        ]);
    }

    public function storeGift($doctorId)
    {
        $doctor = User::find($doctorId);
        return view('client/sent-gift', [
            'doctor' => $doctor,
        ]);
    }

    public function addGift(GiftRequest $request, $doctorId)
    {
        GiftClient::create([
            'links' => $request->links,
            'description' => $request->description,
            'doctor_id' => $doctorId,
            'client_id' => Auth::id(),
            'type' => $request->type,
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
    public function deleteDoctor($doctorId){
        
        $checkEventRequest = EventRequest::where('request_id',Auth::id())->whereIn('status',[0,1])->pluck('event_id');
        $checkEvent = Event::whereIn('id',$checkEventRequest)->where('user_id',$doctorId)->first();
        $checkDate = Carbon::parse($checkEvent->start)->format('d-m-Y');
      if($checkDate == Carbon::now()->format('d-m-Y') || $checkDate >= Carbon::now()->format('d-m-Y')){
         return  back()->with('warning','Attention you have or are waiting for confirmation appointment from the doctor, you can not delete the doctor now. Try later!');
      }
        $doctor = ClientDoctor::where('client_id',Auth::id())->where('doctor_id',$doctorId)->delete();
        if($doctor){
            return  back()->with('success','The doctor has been successfully deleted!');
        }

    }
}
