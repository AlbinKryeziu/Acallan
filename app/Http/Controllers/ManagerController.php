<?php

namespace App\Http\Controllers;

use App\Models\ClientDoctor;
use App\Models\Doctor;
use App\Models\Follow;
use App\Models\GiftClient;
use App\Models\User;
use App\Models\ZoomMeeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::with('role')->whereHas('role', function ($q) {
            $q->where('name', 'Client');
        });
        if (request()->has('q')) {
            $users = User::with('role')
                ->whereHas('role', function ($q) {
                    $q->where('name', 'Client');
                })
                ->where('name', 'LIKE', '%' . request()->get('q') . '%');
        }
        return view('menagers/index', [
            'users' => $users->paginate(30),
        ]);
    }
    public function followAccepted(){
        $users = Follow::where('menager_id',Auth::id())->where('status',Follow::Accepted);
        return view('menagers.followers',[
            'users' => $users->paginate(30),
        ]);
    }
    public function follow($clientId)
    {
        $follow = Auth::user()
            ->follow()
            ->create(['client_id' => $clientId, 'status' => Follow::Request]);
        if ($follow) {
            return back();
        }
    }
    public function canelRequest($clientId)
    {
        $follow = Auth::user()
            ->follow()
            ->where('client_id', $clientId)
            ->delete();
        if ($follow) {
            return back();
        }
    }
    public function unFollow($clientId)
    {
        $follow = Auth::user()
            ->follow()
            ->where('client_id', $clientId)
            ->delete();
        if ($follow) {
            return back();
        }
    }
    public function profileClient($clientId)
    {
        $user = User::findOrFail($clientId);
        $doctors = ClientDoctor::where('client_id', $user->id)->count();
        $gifts = GiftClient::where('client_id', $user->id)->count();
        $metting = ZoomMeeting::where('request_id', $user->id)->count();
        return view('menagers/profile', [
            'user' => $user,
            'doctors' => $doctors,
            'gifts' => $gifts,
            'meeting' => $metting,
        ]);
    }

    public function doctorClients($clientId){
        $doctorId = ClientDoctor::where('client_id', $clientId)->pluck('doctor_id');
        $doctors = User::with('doctor')
            ->whereHas('role', function ($q) {
                $q->where('name', 'Doctor');
            })
            ->whereIn('id', $doctorId);
           if(request()->has('q')){
            $doctors = User::with('doctor')
            ->whereHas('role', function ($q) {
                $q->where('name', 'Doctor');
            })
            ->whereIn('id', $doctorId)->where('name', 'LIKE', '%' . request()->get('q') . '%');
           }
            return view('menagers.doctor',[
                'doctors' =>$doctors->paginate(15),
            ]);

    }
    public function giftCient($clientId){
          $gifts = GiftClient::latest()->where('client_id', $clientId);
          if(request()->has('q')){
            $gifts = GiftClient::latest()->where('client_id', $clientId)->where('description', 'LIKE', '%' . request()->get('q') . '%');
           }
        return view('menagers.gift',[
            'gifts' =>$gifts->paginate(15),
        ]);
    }
    public function meetingClient($clientId){
        $meetings = ZoomMeeting::where('request_id',$clientId);

        return view('menagers.meeting',[
            'meetings' => $meetings->paginate(10),
        ]);
    }

}
