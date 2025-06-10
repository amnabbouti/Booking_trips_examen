<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * booking formated with success wrapper
     */
    public function toArray(Request $request): array
    {
        return [
            'status' => 'success',
            'message' => 'Booking created successfully',
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
}
