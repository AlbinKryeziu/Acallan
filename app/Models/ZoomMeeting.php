<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoomMeeting extends Model
{
    use HasFactory;
    protected $fillable = [
        'start_data',
        'duration',
        'start_url',
        'join_url',
        'doctor_id',
        'event_id',
        'request_id',
        
    ];
    public function doctor(){
        return $this->belongsTo(User::class,'doctor_id','id');
    }
    public function event(){
        return $this->belongsTo(Event::class,'event_id','id');
    }
}
