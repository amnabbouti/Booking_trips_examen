<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canada Trip Planner - Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #fff;
        }
        h1 {
            color: #333;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background: #f5f5f5;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
    </style>
</head>
<body>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1>Admin Dashboard</h1>
        <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
            @csrf
            <button type="submit" style="padding: 8px 16px; background: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer;">
                Logout
            </button>
        </form>
    </div>
    
    @if($trips->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Region</th>
                    <th>Title</th>
                    <th>Start Date</th>
                    <th>Duration (days)</th>
                    <th>Confirmed</th>
                    <th>Pending</th>
                    <th>Cancelled</th>
                    <th>Total Revenue</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trips as $trip)
                    <tr>
                        <td>{{ ucfirst($trip->region) }}</td>
                        <td>{{ $trip->title }}</td>
                        <td>{{ $trip->start_date }}</td>
                        <td>{{ $trip->duration_days }}</td>
                        <td>{{ $trip->confirmed_bookings_count }}</td>
                        <td>{{ $trip->pending_bookings_count }}</td>
                        <td>{{ $trip->cancelled_bookings_count }}</td>
                        <td>C${{ number_format($trip->total_revenue, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No trips available.</p>
    @endif
</body>
</html>
