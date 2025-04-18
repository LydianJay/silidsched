<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    public $timestamps = false;
    protected $table = 'building';


    protected $fillable = [
        'name',
        'building_img',
        'id',
    ];
    

    public function rooms() {
        return $this->hasMany(Room::class, 'building_id');
    }
}
