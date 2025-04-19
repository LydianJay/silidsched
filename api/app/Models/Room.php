<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    
    public $timestamps = false;
    protected $table = 'room';


    protected $fillable = [
        'building_id',
        'room_name',
        'status',
    ];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
