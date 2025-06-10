<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canada Trip Planner - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2 text-primary">Admin Dashboard</h1>
            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class="btn btn-outline-danger">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>        </div>
        
        @if($trips->count() > 0)
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>Region</th>
                                    <th>Title</th>
                                    <th>Start Date</th>
                                    <th>Duration</th>
                                    <th class="text-center">Confirmed</th>
                                    <th class="text-center">Pending</th>
                                    <th class="text-center">Cancelled</th>
                                    <th class="text-end">Total Revenue</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trips as $trip)
                                    <tr>
                                        <td>
                                            @php
                                                $regionColors = [
                                                    'west' => 'danger',
                                                    'east' => 'success', 
                                                    'north' => 'primary',
                                                    'central' => 'warning'
                                                ];
                                                $color = $regionColors[$trip->region] ?? 'secondary';
                                            @endphp
                                            <span class="badge bg-{{ $color }}">{{ ucfirst($trip->region) }}</span>
                                        </td>
                                        <td>
                                            <strong>{{ $trip->title }}</strong>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($trip->start_date)->format('M j, Y') }}</td>
                                        <td>
                                            <span class="badge bg-light text-dark">{{ $trip->duration_days }} day{{ $trip->duration_days > 1 ? 's' : '' }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-success">{{ $trip->confirmed_bookings_count }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-warning text-dark">{{ $trip->pending_bookings_count }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-danger">{{ $trip->cancelled_bookings_count }}</span>
                                        </td>
                                        <td class="text-end">
                                            <strong class="text-success">C${{ number_format($trip->total_revenue, 2) }}</strong>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info text-center">
                <h4>No trips available</h4>
                <p>Please run the seeders to populate the database with sample data.</p>
                <code>php artisan migrate:fresh --seed</code>
            </div>
        @endif
    </div>
</body>
</html>
