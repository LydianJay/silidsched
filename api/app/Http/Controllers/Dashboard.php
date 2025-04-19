<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Building;
use App\Models\Room;
use App\Models\Reservation;

class Dashboard extends Controller
{
    public function index()
    {  
        $buildings = Building::withCount('rooms')->get();
        // $reservations = Reservation::join('room', 'room.id','=','reservation.room_id')
        // ->join('building','building.id','=','room.building_id')
        // ->where('user_id', Auth::user()->id)->get();
        $reservations = Reservation::with('room.building')
        ->where('user_id', Auth::id())
        ->get();

        return view("pages.dashboard.home", ['buildings' => $buildings, 'reservations' => $reservations]);
    }
}
