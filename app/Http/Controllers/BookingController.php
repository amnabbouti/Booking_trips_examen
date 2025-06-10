<?php

namespace App\Http\Controllers;

use App\Services\BookingService;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Resources\BookingResource;
use App\Constants\HttpConstants;

class BookingController extends Controller
{
    public function __construct(
        private BookingService $bookingService
    )
    {
    }

    /**
     * get all bookings for API
     */
    public function index()
    {
        $bookings = $this->bookingService->getAllBookings();

        return response()->json(BookingResource::collection($bookings));
    }

    /**
     * create a new booking
     */
    public function store(StoreBookingRequest $request)
    {
        // all validations are handled in my StoreBookingRequest for a better separation of logics
        $validatedData = $request->validated();

        // create the booking
        $booking = $this->bookingService->createBooking($validatedData);

        return (new BookingResource($booking))->response()->setStatusCode(HttpConstants::CREATED);
    }
}
