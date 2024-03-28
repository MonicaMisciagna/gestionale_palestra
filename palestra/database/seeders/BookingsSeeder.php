<?php

namespace Database\Seeders;

use App\Models\Bookings;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        Bookings::create([
            'user_id' => 2, 
            'course_id' => 2, 
            'time' => now(), 
            'status' => 'confirmed', 
        ]);

        Bookings::create([
            'user_id' => 2,
            'course_id' => 2,
            'time' => now(),
            'status' => 'pending',
        ]);
        Bookings::create([
            'user_id' => 3,
            'course_id' => 3,
            'time' => now(),
            'status' => 'pending',
        ]);
        Bookings::create([
            'user_id' => 4,
            'course_id' => 5,
            'time' => now(),
            'status' => 'pending',
        ]);
        Bookings::create([
            'user_id' => 4,
            'course_id' => 2,
            'time' => now(),
            'status' => 'pending',
        ]);
        Bookings::create([
            'user_id' => 3,
            'course_id' => 4,
            'time' => now(),
            'status' => 'pending',
        ]);
    }
}
