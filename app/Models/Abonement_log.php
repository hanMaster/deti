<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abonement_log extends Model
{
    public function abonement(){
      return $this->belongsTo(Abonement::class);
    }
}
