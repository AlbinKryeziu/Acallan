<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Role;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        return view('events/events', [
            'events' => Event::where('user_id', Auth::id())->get(),
        ]);
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
    public function delete($eventId){
       $event = Event::find($eventId);
       $event->delete();
       if ($event) {
        return redirect()
            ->back()
            ->with('success', 'The event has been successfully deleted');
        }
    }
}
