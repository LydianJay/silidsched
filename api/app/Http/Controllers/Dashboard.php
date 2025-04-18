<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Building;
use App\Models\Room;

class Dashboard extends Controller
{
    public function index()
    {  
        $buildings = Building::withCount('rooms')->get();
        return view("pages.dashboard.home", ['buildings' => $buildings]);
    }
}
