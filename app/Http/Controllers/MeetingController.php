<?php

namespace App\Http\Controllers;

use App\Mail\ZoomLink;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ZoomMeeting;

use App\Traits\ZoomMeetingTrait;
use Carbon\Carbon;
use Facade\FlareClient\Http\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MeetingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    use ZoomMeetingTrait;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function show($id)
    {
        $meeting = $this->get($id);

        return view('meetings.index', compact('meeting'));
    }

    public function store(Request $request)
    {
        $zommdata = $this->create($request->all());
        if ($zommdata) {
            $creteZoom = ZoomMeeting::create([
                'start_data' => Carbon::parse($zommdata['data']['start_time'])->format('Y-m-d H:i'),
                'duration' => $zommdata['data']['duration'],
                'start_url' => $zommdata['data']['start_url'],
                'join_url' => $zommdata['data']['join_url'],
                'doctor_id' => Auth::id(),
                'request_id' => $request->client_id,
                'event_id' => $request->event_id,
            ]);
            $event = Event::where('id', $request->event_id)->first();
            $doctor = User::where('id', $event->user_id)->first();
            $client = User::where('id', $request->client_id)->first();
            $data = [
                'name' => $client->name,
                'doctor' => $doctor->name,
                'start' => $event->start,
                'join_url' => $zommdata['data']['join_url'],
            ];
            // Mail::to($client->email)->send(new ZoomLink($data));
        }

        return back();
    }

    public function update($meeting, Request $request)
    {
        $this->update($meeting->zoom_meeting_id, $request->all());

        return redirect()->route('meetings.index');
    }

    public function destroy(ZoomMeeting $meeting)
    {
        $this->delete($meeting->id);

        return $this->sendSuccess('Meeting deleted successfully.');
    }
}
