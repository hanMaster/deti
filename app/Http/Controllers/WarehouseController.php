<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
  public function index(){
    $data = Warehouse::paginate(10);
    return view('warehouse.index', compact('data'));
  }
}
