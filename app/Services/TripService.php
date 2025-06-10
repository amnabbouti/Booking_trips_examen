<?php

namespace App\Services;

use App\Models\Trip;
use Illuminate\Database\Eloquent\Collection;

class TripService
{
    /**
     * Get all trips
     */
    public function getAllTrips(): Collection
    {
        return Trip::select([
            'id',
            'title',
            'region',
            'start_date',
            'duration_days',
            'price_per_person'
        ])->get();
    }

    /**
     * Get all trips for the admin dashboard
     * i added sorting by start_date ascending
     */
    public function getTripsWithBookingStats(): Collection
    {
        return Trip::with(['bookings' => function ($query) {
            $query->select('trip_id', 'status', 'number_of_people');
        }])
            ->orderBy('start_date', 'asc')
            ->get()
            ->map(function ($trip) {
                $trip->confirmed_bookings_count = $trip->bookings->where('status', 'confirmed')->count();
                $trip->pending_bookings_count = $trip->bookings->where('status', 'pending')->count();
                $trip->cancelled_bookings_count = $trip->bookings->where('status', 'cancelled')->count();

                // Total price per person (i kept logic in the service layer for better separation of concerns)
                $trip->total_revenue = $trip->bookings
                    ->where('status', 'confirmed')
                    ->sum(function ($booking) use ($trip) {
                        return $trip->price_per_person * $booking->number_of_people;
                    });

                return $trip;
            });
    }

    /**
     * Check if a trip exists
     */
    public function tripExists(int $id): bool
    {
        return Trip::where('id', $id)->exists();
    }
}
