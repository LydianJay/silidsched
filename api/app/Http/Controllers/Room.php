<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Building;
use App\Models\Room as RoomModel;
class Room extends Controller
{
    public function index() {

        $building = Building::all();

        return view('pages.dashboard.room.view', ['buildings' => $building]);
    }


    public function create(Request $request )  {
        $data = $request->validate(['name' => 'required', 'building' => 'required']);


        RoomModel::create(
            [
                'building_id'   => $data['building'],
                'room_name'     => $data['name'],
                'status'        => 'vacant',
            ]
        ); 

        return back()->with('msg', 'Room Created');

    }


    public function delete_room_view() {
        $rooms = RoomModel::all();
        // dd($rooms);
        return view('pages.dashboard.room.delete_view', ['rooms' => $rooms]);
    }

    public function delete(Request $request) {
        $data = $request->validate(['id' => 'required']);

        $room = RoomModel::find($data['id']);
        if ($room) {
            $room->delete();
            return back()->with('msg', 'Room Deleted');
        } else {
            return back()->with('error', 'Room not found');
        }
    }
}
