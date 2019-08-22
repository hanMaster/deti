<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abonement extends Model
{
    public function abonementLogs(){
      return $this->hasMany(Abonement_log::class);
    }
}
