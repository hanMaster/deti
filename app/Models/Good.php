<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
  public function goods_in (){
    return $this->hanMany('App\Models\Goods_in');
  }
}
