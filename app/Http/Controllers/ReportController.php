<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GoodsLog;
use App\Models\Check;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function salesReport(){
      $goodsLogs = GoodsLog::where('optype','-')->get();
      $total = GoodsLog::where('optype','-')->sum('amount');
      return view('reports.sales', compact('goodsLogs', 'total'));
    }

    public function clientSpentReport(){
      $clientsSpent = DB::select( DB::raw('select clients.name as name, checks.client_id, sum(checks.total) as total from checks 
      inner join clients on clients.id = checks.client_id
      where is_closed = true group by name, client_id
      order by total desc'));
      return view('reports.clientSpent', compact('clientsSpent'));
    }
}
