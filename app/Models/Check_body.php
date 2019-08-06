<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Check_body extends Model
{
  public function check(){
    return $this->belongsTo('App\Models\Check');
  }

  public function goodName($id) {
    return Good::find($id)->name;
  }

  public function isGood(){
    return (Good::find($this->good_id)->type == 'good');
  }

}
