<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trip;
use App\Models\Booking;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = ['west', 'east', 'north', 'central'];
        
        foreach ($regions as $region) {
            $trip = Trip::factory()->create([
                'region' => $region,
            ]);
            
            Booking::factory()->create([
                'trip_id' => $trip->id,
                'status' => 'pending'
            ]);
            
            Booking::factory()->create([
                'trip_id' => $trip->id,
                'status' => 'confirmed'
            ]);
            
            Booking::factory()->create([
                'trip_id' => $trip->id,
                'status' => 'cancelled'
            ]);
            
            Booking::factory()->create([
                'trip_id' => $trip->id,
                'status' => 'pending'
            ]);
        }
        
        // added two more trips with 4 bookings each
        for ($i = 0; $i < 2; $i++) {
            $trip = Trip::factory()->create();
            
            Booking::factory()->create([
                'trip_id' => $trip->id,
                'status' => 'pending'
            ]);
            
            Booking::factory()->create([
                'trip_id' => $trip->id,
                'status' => 'confirmed'
            ]);
            
            Booking::factory()->create([
                'trip_id' => $trip->id,
                'status' => 'cancelled'
            ]);
            
            Booking::factory()->create([
                'trip_id' => $trip->id,
                'status' => 'confirmed'
            ]);
        }
    }
}
