<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\TutorProfile;
use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Levels
        $this->call([
            LevelSeeder::class,
            SubscriptionPlanSeeder::class,
        ]);

        $password = Hash::make('123456');

        // 2. Default Admin
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin User',
                'password' => $password,
                'role' => 'admin',
                'status' => 'active',
            ]
        );

        // 3. Default Tutor
        $tutor = User::updateOrCreate(
            ['email' => 'tutor@gmail.com'],
            [
                'name' => 'John Teacher',
                'password' => $password,
                'role' => 'tutor',
                'status' => 'active',
                'phone' => '9876543210',
            ]
        );

        TutorProfile::updateOrCreate(
            ['user_id' => $tutor->id],
            [
                'bio' => 'Experienced English tutor with 5+ years of teaching.',
                'qualification' => 'MA in English Literature',
                'experience' => 5,
                'price' => 5000,
                'tutor_type' => 'both',
                'is_available' => true,
            ]
        );

        Location::updateOrCreate(
            ['user_id' => $tutor->id],
            [
                'city' => 'Mumbai',
                'state' => 'Maharashtra',
                'area' => 'Andheri West',
                'latitude' => 19.1136,
                'longitude' => 72.8697,
            ]
        );

        // 4. Default Student
        User::updateOrCreate(
            ['email' => 'student@gmail.com'],
            [
                'name' => 'Student User',
                'password' => $password,
                'role' => 'student',
                'status' => 'active',
            ]
        );
    }
}
