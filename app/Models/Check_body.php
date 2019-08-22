<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Check_body extends Model
{
  public function check(){
    return $this->belongsTo('App\Models\Check');
  }

  public function isGood(){
    return (Good::find($this->good_id)->type == 'good');
  }

  public function good(){
    return $this->belongsTo('App\Models\Good');
  }
}
