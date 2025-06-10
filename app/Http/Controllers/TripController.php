<?php

namespace App\Http\Controllers;

use App\Services\TripService;
use App\Http\Resources\TripResource;

class TripController extends Controller
{
    public function __construct(
        private TripService $tripService
    ) {}

    /**
     * get all trips for the API
     */
    public function index()
    {
        $trips = $this->tripService->getAllTrips();
        
        return TripResource::collection($trips);
    }

    /**
     * show trips
     */
    public function adminIndex()
    {
        $trips = $this->tripService->getTripsWithBookingStats();
        
        return view('trips.index', compact('trips'));
    }
}
