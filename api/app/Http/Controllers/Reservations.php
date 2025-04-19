<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation as ReservationModel;
use App\Models\Room;
use Carbon\Carbon;
class Reservations extends Controller
{
    public function index() {



        return view('pages.dashboard.reservation.view');
    }



    public function reserve(Request $request) {
        $validated = $request->validate([
            'room_id'   => ['required'],
            'date'      => ['required', 'date', 'after_or_equal:today'],
            'start'     => ['required', 'date_format:H:i'],
            'end'       => ['required', 'date_format:H:i', 'after:start'],
        ]);


        $time_in    = $validated['start'];
        $time_out   = $validated['end'];
        $date       = $validated['date'];

        $t1 = strtotime($time_in);
        $t2 = strtotime($time_out);

        $start      = Carbon::createFromFormat('Y-m-d H:i',$date . ' ' . $time_in);
        $end        = Carbon::createFromFormat('Y-m-d H:i',$date . ' ' . $time_out);
        $duration   = ($t2 - $t1) / 3600; // in hours
        
        $overlap = ReservationModel::where('room_id', $validated['room_id'])
                ->whereDate('reserved_date', $start->toDateString())
                ->where(function ($query) use ($start, $end) {
                    $query->whereBetween('reserved_date', [$start, $end])
                        ->orWhereRaw('? BETWEEN reserved_date AND DATE_ADD(reserved_date, INTERVAL duration HOUR)', [$start]);
                })
                ->exists();

        if ($overlap) {
            return back()->withErrors(['overlap' => 'This room is already reserved during this time.']);
        }
        else if($duration < 0) { // negative time
            return back()->withErrors(provider: ['invalid' => 'Invalid time']);
        }

        ReservationModel::create([
            'user_id'       => \Illuminate\Support\Facades\Auth::user()->id,
            'room_id'       => $validated['room_id'],
            'start_time'    => $time_in,
            'end_time'      => $time_out,
            'reserved_date' => $validated['date'],
            'duration'      => $duration,
        ]);
        
        Room::find($validated['room_id'])->update(
            ['status' => 'reserved']
        );

        return redirect()->route('reservation', request()->except('room_idx'))->with('success','Reserved Room');
    }
}
