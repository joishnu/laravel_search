<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Customer List</title>
        <!-- Include Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <h1 class="mb-4">Customer List</h1>

            <!-- Search Form -->
            <form action="{{ route('customers.index') }}" method="GET" class="mb-4">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <input type="text" name="email" class="form-control" placeholder="Search by Email" value="{{ request()->email }}">
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" name="order_number" class="form-control" placeholder="Search by Order Number" value="{{ request()->order_number }}">
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" name="item_name" class="form-control" placeholder="Search by Item Name" value="{{ request()->item_name }}">
                    </div>
                    <div class="form-group col-md-3">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Orders</th>
                        <th>Items</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                @foreach($customer->orders as $order)
                                    <p>Order #{{ $order->order_number }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach($customer->orders as $order)
                                    @foreach($order->items as $item)
                                        <p>{{ $item->name }} ({{ $item->quantity }})</p>
                                    @endforeach
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                {{ $customers->links('pagination::bootstrap-4') }}
            </div>
        </div>
        
        <!-- Include Bootstrap JS and dependencies (optional, for Bootstrap's interactive components) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
