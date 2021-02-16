<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EventRequest;
use Illuminate\Support\Facades\Auth;

class Event extends Model
{
    use HasFactory;

    public function user(){

        return $this->belongsTo(User::class);
  }

    public function requestEvent(){
     return $this->hasMany(EventRequest::class,'event_id', 'id');
  }
  
} 
