<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;


class Way extends Model
{
    public function city()
   {
      return $this->belongsTo(City::class);
   }
}
