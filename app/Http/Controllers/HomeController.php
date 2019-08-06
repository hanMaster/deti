<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bcalendar;
use App\Models\Check;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $birthdays = Bcalendar::all();
      foreach ($birthdays as $b) {
        $b->date = Carbon::parse($b->birthday);
        $year = $b->date->year;
        $curr_date = Carbon::today();
        $curr_date->year = $year;
        $b->diff = $b->date->diffInDays($curr_date);
      }

      $visitors = DB::table('clients')
        ->select('checks.id','checks.client_id','clients.name', 'checks.created_at')
        ->join('checks', 'clients.id', '=', 'checks.client_id')
        ->where('checks.is_closed','false')
        ->get();
      foreach($visitors as $visitor){
        $visitor->created_at = Carbon::parse($visitor->created_at)->toTimeString();
      }


          // dd($visitors);

      return view('home', compact('birthdays', 'visitors'));
    }
}
