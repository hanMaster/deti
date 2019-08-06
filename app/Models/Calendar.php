<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
  public function getEventName($good_id)
  {
    return Good::findOrFail($good_id)->name;
  }
}
