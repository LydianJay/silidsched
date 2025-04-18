<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public $timestamps = false;
    protected $table = 'reservation';


    protected $fillable = [
        'user_id',
        'room_id',
        'reserved_date',
        'duration'
    ];
}
