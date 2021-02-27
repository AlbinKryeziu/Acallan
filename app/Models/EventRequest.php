<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class EventRequest extends Model
{
    use HasFactory;
    
    const Sent = 0;
    const Accepted = 1;
    const Rejected = 2;

    protected $fillable = [
        'request_id',
        'event_id',
        'status',
        'product',
        'article',
    ];
    protected $table = 'event_requests';

    public function requestClient(){
        return $this->belongsTo(User::class ,'request_id','id');
    }

    public function event(){
        return $this->belongsTo(Event::class,'event_id', 'id');
    }
}
