<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Building;
use App\Models\Room;
use App\Models\Reservation;
use Carbon\Carbon;

class Dashboard extends Controller
{   

    public function index()
    {  
        $this->update();

        $buildings = Building::withCount('rooms')->get();
        // $reservations = Reservation::join('room', 'room.id','=','reservation.room_id')
        // ->join('building','building.id','=','room.building_id')
        // ->where('user_id', Auth::user()->id)->get();
        $reservations = Reservation::with('room.building')
        ->where('user_id', Auth::id())
        ->get();

        return view("pages.dashboard.home", ['buildings' => $buildings, 'reservations' => $reservations]);
    }


    private function update() {
        $now = Carbon::now();
        $expiredReservations = Reservation::whereDate('reserved_date', '<=' ,$now->toDateString())
        ->whereTime('end_time', '<', $now->toTimeString())
        ->get();


        foreach ($expiredReservations as $reservation) {
            $room = Room::find($reservation->room_id);
            if ($room && $room->status !== 'vacant') {
                $room->status = 'vacant';
                $room->save();

            }
            $reservation->delete();
        }   

        
    }
}
