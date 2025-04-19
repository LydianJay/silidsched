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
        'start_time',
        'end_time',
        'reserved_date',
        'duration',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
