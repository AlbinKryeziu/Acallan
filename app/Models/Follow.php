<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    const Request = 1;
    const Accepted = 2;
    const Rejected = 3;

    protected $fillable = [
        'menager_id',
        'client_id',
        'status',
    ];

    public function following(){
        return $this->belongsTo(User::class,'client_id','id');
    }
}
