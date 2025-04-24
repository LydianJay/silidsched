<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Laravel\Pail\ValueObjects\Origin\Console;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


// Schedule::call(function () {
//     $now = Carbon::now();  
//     dd($now);
//     Log::info('Current date: ' . $now->toDateString());

//     $expiredReservations = Reservation::whereDate('reserved_date', '<=' ,$now->toDateString())
//         ->whereTime('end_time', '<', $now->toTimeString())
//         ->get();

//     Log::debug('Expired reservations: ' . $expiredReservations->count());
//     foreach ($expiredReservations as $reservation) {
//         $room = Room::find($reservation->room_id);
//         if ($room && $room->status !== 'vacant') {
//             $room->status = 'vacant';
//             $room->save();

//         }
//         $reservation->delete();
//     }   

// })->everyTenMinutes()
//   ->name('update.room.status')
//   ->withoutOverlapping()
//   ->between('05:00', '22:00')
//   ->timezone('Asia/Manila')->onFailure(function(){
//     Log::info('Scheduler is running...');
//   })->sendOutputTo(storage_path('logs/scheduler.log'), true);