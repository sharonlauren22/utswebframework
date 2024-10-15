<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $flights = [
            [
                'flight_code' => 'SA601',
                'origin' => 'SUB',
                'destination' => 'SIN',
                'departure_time' => '2024-10-15 13:00:00',
                'arrival_time' => '2024-10-15 16:00:00'
            ],
            [
                'flight_code' => 'JT501',
                'origin' => 'SUB',
                'destination' => 'CGK',
                'departure_time' => '2024-10-15 13:00:00',
                'arrival_time' => '2024-10-15 16:00:00'
            ],
            [
                'flight_code' => 'GA212',
                'origin' => 'SUB',
                'destination' => 'KLN',
                'departure_time' => '2024-10-15 13:00:00',
                'arrival_time' => '2024-10-15 16:00:00'
            ],
            [
                'flight_code' => 'SA553',
                'origin' => 'SUB',
                'destination' => 'SIN',
                'departure_time' => '2024-10-15 13:00:00',
                'arrival_time' => '2024-10-15 16:00:00'
            ],
            [
                'flight_code' => 'GA601',
                'origin' => 'SUB',
                'destination' => 'SIN',
                'departure_time' => '2024-10-15 13:00:00',
                'arrival_time' => '2024-10-15 16:00:00'
            ],
            [
                'flight_code' => 'PL231',
                'origin' => 'SUB',
                'destination' => 'MLN',
                'departure_time' => '2024-10-15 13:00:00',
                'arrival_time' => '2024-10-15 16:00:00'
            ],
        ];

        foreach ($flights as $flight) {
            \App\Models\Flight::create($flight);
        }
    }
}
