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
use Illuminate\Support\Facades\Validator;
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
        try {
            $validator = Validator::make($request->all(), [
                'start_time' => 'required|date',
            ]);

            if ($validator->fails()) {
                return [
                    'success' => false,
                    'data' => $validator->errors(),
                ];
            }
            $data = $validator->validated();

            $path = 'users/me/meetings';
            $response = $this->zoomPost($path, [
                'type' => self::MEETING_TYPE_SCHEDULE,
                'start_time' => $this->toZoomTimeFormat($request->start_time),
                'duration' => 180,
                'settings' => [
                    'host_video' => false,
                    'participant_video' => false,
                    'waiting_room' => true,
                ],
            ]);
        } catch (Throwable $e) {
            report($e);

            return false;
        }

        $data = json_decode($response->body(), true);

        if ($data) {
            $zoom = new ZoomMeeting();
            $zoom->start_data = Carbon::parse($data['start_time'])->format('Y-m-d H:i');
            $zoom->duration = $data['duration'];
            $zoom->start_url = $data['start_url'];
            $zoom->join_url = $data['join_url'];
            $zoom->request_id = $request->client_id;
            $zoom->event_id = $request->event_id;
            $zoom->save();

            $event = Event::where('id', $request->event_id)->first();
            $doctor = User::where('id', $event->user_id)->first();
            $client = User::where('id', $request->client_id)->first();
            $data = [
                'name' => $client->name,
                'doctor' => $doctor->name,
                'start' => $event->start,
                'join_url' => $data['join_url'],
            ];
            Mail::to($client->email)->send(new ZoomLink($data));
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
