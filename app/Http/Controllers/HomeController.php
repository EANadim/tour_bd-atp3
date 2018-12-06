<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour_location;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $req)
    {
        $req->session()->put('user_id',1);
        $tour_locations=DB::table('tour_locations')->get();
        return view('home.index')->with('tour_locations',$tour_locations);
    }
}
