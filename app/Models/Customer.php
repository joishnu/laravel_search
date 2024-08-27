<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    // Define the relationship with the Order model
    public function orders()
    {
        // A customer can have many orders
        return $this->hasMany(Order::class);
    }
}
