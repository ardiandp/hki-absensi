<?php

namespace Database\Seeders;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Database\Factories\AttendanceFactory; // Pastikan import ini di baris atas

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

          // Create 10 users
            // Create 10 users and for each user, create 5 attendances
        user::factory(10)->create();
        attendance::factory(100)->create();
       
       
    }
}
