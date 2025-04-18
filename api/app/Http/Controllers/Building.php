<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Building as BuildingModel;
class Building extends Controller
{
    public function index() {
        return view('pages.dashboard.buildings.view');
    }


    public function reservation(Request $request) {

        $nav_title = [
            'Rooms',
            'Vacant',
            'Occupied',
        ];
        $bldg_id = $request->input('bldg_id');
        $current = BuildingModel::withCount('rooms')->find($bldg_id);

        $index = $request->input('i') != '' && $request->input('i') != null ? $request->get('i') : 0;

        $data = [];
        $buildings = [];

        switch($index) {
            case 0:
                $buildings = BuildingModel::join('room', 'building.id', '=', 'room.building_id')
                ->where('building.id', $bldg_id)
                ->select('building.*', 'room.id as room_id', 'room.room_name as room_name', 'room.status as status')
                ->get();
            break;

            case 1:
                $buildings = BuildingModel::join('room', 'building.id', '=', 'room.building_id')
                ->where('building.id', $bldg_id)
                ->where('room.status', '=' , 'vacant')
                ->select('building.*', 'room.id as room_id', 'room.room_name as room_name', 'room.status as status')
                ->get();
            break;

            case 2:
                $buildings = BuildingModel::join('room', 'building.id', '=', 'room.building_id')
                ->where('building.id', $bldg_id)
                ->where('room.status', '=' , 'occcupied')
                ->select('building.*', 'room.id as room_id', 'room.room_name as room_name', 'room.status as status')
                ->get();
                break;

        }


        return view('pages.dashboard.buildings.reservation', ['current' => $current, 'nav_titles' => $nav_title, 'index' => $index, 'buildings' => $buildings]);
    }

    public function upload(Request $request) {

        $data = $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png|max:4056',
            'name' => 'required'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            // Optional: rename file
            $filename = md5($data['name']) . '.' . $extension;

            $filePath = $file->storeAs('buildings', $filename, 'public');
            BuildingModel::create(['name' => $data['name'], 'building_img' => $filename]);

            return back()->with('msg', 'File uploaded');
        }

        return back()->with('msg', 'No file selected.');
    }
}
