<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class EventRequest extends Model
{
    use HasFactory;
    
    const sent = 0;
    const accepted = 1;
    const rejected = 2;

    protected $fillable = [
        'request_id',
        'event_id',
        'status',
    ];

    public function requestClient(){
        return $this->belongsTo(User::class ,'request_id','id');
    }

    public function event(){
        return $this->belongsTo(Event::class,'event_id', 'id');
    }
}
