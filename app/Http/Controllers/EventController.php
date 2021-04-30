<?php

namespace App\Http\Controllers;

use App\Mail\EventAccepted;
use App\Models\Email;
use App\Models\Event;
use App\Models\EventRequest;
use App\Models\Role;
use App\Models\ZoomMeeting;
use Facade\FlareClient\View;
use Hamcrest\Core\Every;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $event = Event::where('user_id', Auth::id());
        return view('events/events', [
            'events' => $event->paginate(10),
        ]);
    }
    public function eventRequest($eventId)
    {
        $event = Event::where('id', $eventId)->get();
        $eventRequest = EventRequest::where('event_id', $eventId);
        return view('doctor/request-event', [
            'event' => $event,
            'eventRequest' => $eventRequest->paginate(6),
        ]);
    }

    public function aceptEvent(Request $request)
    {
        $eventId = $request->eventid;
        $requestId = $request->requestId;

        $event = EventRequest::where('id', $requestId)->update([
            'status' => EventRequest::Accepted,
        ]);
        if ($event) {
            $updateStatusToEvent = Event::where('id', $eventId)->update([
                'status' => EventRequest::Accepted,
            ]);
            $eventRequest = EventRequest::where('id', $requestId)->first();
            $doctor = Event::where('id', $eventId)->first();

            $data = [
                'name' => $eventRequest->requestClient->name,
                'doctor' => $doctor->user->name,
                'start' => $doctor->start,
                'end' => $doctor->end,
            ];
        //     $eemail = Mail::to($eventRequest->requestClient->email)->send(new EventAccepted($data));
        //     if ($eemail) {
        //         $emailDb = new Email();
        //         $emailDb->type = 'Event Accepted';
        //         $emailDb->doctor_id = $doctor->user->id;
        //         $emailDb->doctor_id = $eventRequest->requestClient->id;
        //         $emailDb->status = 1;
        //         $emailDb->save();
        //     } else {
        //         $emailDb->update([
        //             'status' => 0,
        //         ]);
        //     }
        // }
        $eventrefuzed = EventRequest::where('event_id', $eventId)
            ->where('status', 0)
            ->get();
        if ($event) {
            foreach ($eventrefuzed as $event) {
                $event->update([
                    'status' => EventRequest::Rejected,
                ]);
            }
        }

        return redirect()->back();
    }

    public function rejectetEevnt(Request $request)
    {
        $eventId = $request->eventid;
        $event = EventRequest::where('id', $eventId)->update([
            'status' => EventRequest::Rejected,
        ]);

        return redirect()->back();
    }

    public function editEvent($eventId)
    {
        $event = Event::find($eventId);

        return view('doctor/edit-event', [
            'event' => $event,
        ]);
    }
    public function updateEvent(Request $request, $eventId)
    {
        $start = Carbon::parse($request->start)->format('Y-m-d H:s:i');
        $end = Carbon::parse($request->end)->format('Y-m-d H:s:i');

        $checkEvent = Event::where('user_id', Auth::user()->id)
            ->whereBetween('start', [$start, $end])
            ->whereBetween('end', [$start, $end])
            ->get();

        if (!$checkEvent->isEmpty()) {
            return redirect()
                ->back()
                ->with('warning', 'Attention this event exists at your events');
        }
        $event = Event::where('id', $eventId)->update([
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
        ]);

        if ($event) {
            return redirect()
                ->back()
                ->with('success', 'The event has been successfully updated');
        }
    }
    public function delete($eventId)
    {
        $event = Event::find($eventId);

        $event->delete();
        if ($event) {
            $requestEvent = EventRequest::where('event_id', $eventId)->delete();
            $zoom = ZoomMeeting::where('event_id', $eventId)->delete();
            return redirect()
                ->back()
                ->with('success', 'The event has been successfully deleted');
        }
    }
}
