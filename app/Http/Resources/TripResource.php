<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource
{
    /**
     * trip formatted
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'region' => $this->region,
            'start_date' => $this->start_date,
            'duration_days' => $this->duration_days,
            'price_per_person' => $this->price_per_person,
        ];
    }

    /**
     * wrapper for better response structure
     */
    public function with(Request $request): array
    {
        return [
            'status' => 'success',
            'message' => 'Trips retrieved successfully',
        ];
    }
}
