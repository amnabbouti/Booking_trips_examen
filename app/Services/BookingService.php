<?php

namespace App\Services;

use App\Models\Booking;

class BookingService
{
    /**
     *  i added the TripService to inject TripService in the constructor which allows us to check if a trip exists
     *  when creating a booking
     *  this way we avoid that booking accesses trip directly
     */
    public function __construct(
        private TripService $tripService
    ) {}

    /**
     * Create a new booking
     */
    public function createBooking(array $data): Booking
    {
        // default status as pending
        $data['status'] = 'pending';
        
        return Booking::create($data);
    }

    /**
     * Validate if trip exists
     */
    public function validateTripExists(int $tripId): bool
    {
        return $this->tripService->tripExists($tripId);
    }

    /**
     * authentication token
     */
    public function generateToken(string $email): string
    {
        return md5($email . 'canadarocks');
    }    

    /**
     * Verify if provided token is correct
     */
    public function verifyToken(string $email, string $token): bool
    {
        return $this->generateToken($email) === $token;
    }
}
