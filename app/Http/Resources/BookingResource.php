<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Constants\ResponseMessages;

class BookingResource extends JsonResource
{
    /**
     * booking formated with success wrapper
     */
    public function toArray(Request $request): array
    {
        return [
            'status' => 'success',
            'message' => ResponseMessages::BOOKING_CREATED,
            'data' => [
                'id' => $this->id,
                'trip_id' => $this->trip_id,
                'name' => $this->name,
                'email' => $this->email,
                'number_of_people' => $this->number_of_people,
                'status' => $this->status,
                'created_at' => $this->created_at,
            ]
        ];
    }

    /**
     * wrap bookings collection with status and message
     */
    public static function collection($resource)
    {
        return [
            'status' => 'success',
            'message' => 'Bookings retrieved successfully',
            'data' => $resource->map(function ($booking) {
                return [
                    'id' => $booking->id,
                    'trip_id' => $booking->trip_id,
                    'name' => $booking->name,
                    'email' => $booking->email,
                    'number_of_people' => $booking->number_of_people,
                    'status' => $booking->status,
                    'created_at' => $booking->created_at,
                ];
            })
        ];
    }
}
