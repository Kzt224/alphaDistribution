<?php

namespace App\Models;

use App\Models\Outlet;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    public function outlet():BelongsTo
    {
        return $this->belongsTo(Outlet::class);
    }

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    
}
