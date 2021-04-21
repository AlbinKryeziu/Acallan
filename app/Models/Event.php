<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EventRequest;
use Illuminate\Support\Facades\Auth;

class Event extends Model
{
    use HasFactory;
    
    const Sent = 0;
    const Accepted = 1;
    const Rejected = 2;

    public function user(){

        return $this->belongsTo(User::class);
  }

    public function requestEvent(){
     return $this->hasMany(EventRequest::class,'event_id', 'id');
  }
  
  public function zoom(){
    return $this->hasOne(ZoomMeeting::class,'event_id', 'id');
  }
  public function requestAccepted(){
    return $this->hasOne(EventRequest::class,'event_id', 'id')->where('status',1);
  }
} 
