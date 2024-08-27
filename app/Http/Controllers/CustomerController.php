<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    // Method to handle search requests
    public function index(Request $request)
    {
        // Start building the query with the Customer model, eager loading related orders and items
        $query = Customer::select('id', 'name', 'email')->with(['orders.items']);

        // Check if an email search term is provided
        if ($request->has('email')) {
            // Filter customers by email using a 'like' query
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        // Check if an order number search term is provided
        if ($request->has('order_number')) {
            // Use 'whereHas' to filter customers based on related order numbers
            $query->whereHas('orders', function ($orderQuery) use ($request) {
                $orderQuery->where('order_number', 'like', '%' . $request->order_number . '%');
            });
        }

        // Check if an item name search term is provided
        if ($request->has('item_name')) {
            // Use 'whereHas' to filter customers based on related item names
            $query->whereHas('orders.items', function ($itemQuery) use ($request) {
                $itemQuery->where('name', 'like', '%' . $request->item_name . '%');
            });
        }

        // Execute the query and retrieve the filtered customers
        $customers = $query->paginate(10);

        // Return the search results to a view
        return view('customers.index', compact('customers'));
    }
}
