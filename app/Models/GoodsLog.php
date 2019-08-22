<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsLog extends Model
{
  public function good(){
    return $this->belongsTo('App\Models\Good');
  }

  
}
