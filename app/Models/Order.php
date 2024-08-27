<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    // Define the relationship with the Customer model
    public function customer()
    {
        // Each order belongs to a single customer
        return $this->belongsTo(Customer::class);
    }

    // Define the relationship with the Item model
    public function items()
    {
        // An order can have multiple items
        return $this->hasMany(Item::class);
    }
}
