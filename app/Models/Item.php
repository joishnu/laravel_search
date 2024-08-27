<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    // Define the relationship with the Order model
    public function order()
    {
        // Each item belongs to a single order
        return $this->belongsTo(Order::class);
    }
}
