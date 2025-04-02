
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Front Page</title>
</head>
<body>
    <h1>Welcome to the Restaurant Management System</h1>
    <ul>
        <li><a href="{{ route('reservations.create') }}">Create Reservation</a></li>
        <li><a href="{{ route('reservations.index') }}">View Reservations</a></li>
        <li><a href="{{ route('reservations.calendar') }}">Reservation Calendar</a></li>
        <li><a href="{{ route('users.create') }}">Create User</a></li>
        <li><a href="{{ route('users.index') }}">View Users</a></li>
        <li><a href="{{ route('orders.menu') }}">View Menu</a></li>
        <li><a href="{{ route('orders.index') }}">View Orders</a></li>
        <li><a href="{{ route('menu.create') }}">Create Menu Item</a></li>
        <li><a href="{{ route('menu.index') }}">View Menu Items</a></li>
        <li><a href="{{ route('shifts.index') }}">View Shifts</a></li>
        <li><a href="{{ route('tables.index') }}">View Tables</a></li>
        <li><a href="{{ route('loyalty.index') }}">Loyalty Program</a></li>
        <li><a href="{{ route('rewards.index') }}">View Rewards</a></li>
        <li><a href="{{ route('payment.page') }}">Payment Page</a></li>
    </ul>
</body>
</html>