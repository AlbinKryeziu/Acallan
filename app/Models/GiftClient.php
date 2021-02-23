<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'links',
        'description',
        'client_id',
        'doctor_id',
        'type',

    ];

    public function doctor(){
      return $this->belongsTo(User::class ,'doctor_id','id');
    }

    public function client(){
        return $this->belongsTo(User::class ,'client_id','id');
      }
}
