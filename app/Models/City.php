<?php

namespace App\Models;

use App\Models\Way;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class City extends Model
{
   public function way(): BelongsTo
   {
       return $this->belongTo(Way::class);
   }
}
