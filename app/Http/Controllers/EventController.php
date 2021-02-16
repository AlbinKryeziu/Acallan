<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRequest;
use App\Models\Role;
use Facade\FlareClient\View;
use Hamcrest\Core\Every;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        //  return Event::with('requestEvent')->get();
        return view('events/events', [
            'events' => Event::where('user_id', Auth::id())->get(),
        ]);
    }
    public function eventRequest($eventId)
    {
        $eventAccepted = EventRequest::where('event_id', $eventId)
            ->where('status', 1)
            ->count();
        $eventRequest = Event::with('requestEvent')
            ->where('id', $eventId)
            ->get();
        return view('doctor/request-event', [
            'eventRequest' => $eventRequest,
            'eventAccepted' => $eventAccepted,
        ]);
    }

    public function aceptEvent(Request $request)
    {
        $eventId = $request->eventid;
        $requestId = $request->requestId;

        $event = EventRequest::where('id', $requestId)->update([
            'status' => EventRequest::Accepted,
        ]);
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
            return redirect()
                ->back()
                ->with('success', 'The event has been successfully deleted');
        }
    }
}
