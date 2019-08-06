<?php

namespace App\Models;
use App\Models\GoodsLog;

use Illuminate\Database\Eloquent\Model;

class Goods_in extends Model
{
  public function log($operation){
    if($operation == 'add'){
      $raw = new GoodsLog();
      $raw->optype = '+';
      $raw->good_id = $this->good_id;
      $raw->doc_id = $this->id;
      $raw->quantity = $this->quantity;
      $raw->amount = $this->amount*100;
      $raw->save();
    }elseif($operation == 'delete'){
      $raw = GoodsLog::where('doc_id', $this->id)->delete();
    }
  }
}
