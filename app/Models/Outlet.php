<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Outlet extends Model
{
   public function city():BelongsTo

   {
     return $this->belongsTo(City::class);
   }

}
