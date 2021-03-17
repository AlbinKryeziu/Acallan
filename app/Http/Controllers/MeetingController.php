<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZoomMeeting;

use App\Traits\ZoomMeetingTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MeetingController extends Controller
{
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
     
     $zommdata =  $this->create($request->all());
     if($zommdata){
         $creteZoom = ZoomMeeting::create([
             'start_data'=>Carbon::parse($zommdata['data']['start_time'])->format('Y-m-d H:i'),
             'duration' =>$zommdata['data']['duration'],
             'start_url' =>$zommdata['data']['start_url'],
             'join_url' =>$zommdata['data']['join_url'],
             'doctor_id' =>Auth::id(),
             'request_id' => $request->client_id,
             'event_id' => $request->event_id,
             
         ]);
     }
    
     return  back();
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
