<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class FullCalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Event::where('user_id', Auth::id())
                ->whereDate('start', '>=', $request->start)
                ->whereDate('end', '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);

            return response()->json($data);
        }
    }

    public function create(Request $request)
    {
        $insertArr = ['title' => $request->title, 'start' => $request->start, 'end' => $request->end, 'user_id' => Auth::id()];

        $event = Event::insert($insertArr);
        return response()->json($event);
    }

    public function update(Request $request)
    {
        $where = ['id' => $request->id];
        $updateArr = ['title' => $request->title, 'start' => $request->start, 'end' => $request->end, 'user_id' => Auth::id()];
        $data = Event::where($where)->update($updateArr);

        return response()->json($data);
    }

    public function destroy(Request $request)
    {
        $data = Event::where('id', $request->id)->delete();

        return response()->json($data);
    }
    public function store(Request $request)
    {
        $dateStart = $request->startData . ' ' . $request->startTime;
        $dateEnd = $request->endData . ' ' . $request->endTime;

        $event = new Event();
        $event->title = $request->title;
        $event->start = $dateStart;
        $event->end = $dateEnd;
        $event->user_id = Auth::id();
        $event->save();
        return back();
    }
}
