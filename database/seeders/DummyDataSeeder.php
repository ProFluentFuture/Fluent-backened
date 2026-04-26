<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\TutorProfile;
use App\Models\Location;
use App\Models\Booking;
use App\Models\Attendance;
use App\Models\Chat;
use App\Models\Message;
use App\Models\Review;
use App\Models\AvailabilitySlot;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        $password = Hash::make('123456');

        // 1. Create Tutors
        $tutors = [];
        $tutorNames = ['Alice Johnson', 'Bob Smith', 'Charlie Davis', 'Diana Prince', 'Edward Norton'];
        
        foreach ($tutorNames as $index => $name) {
            $tutor = User::create([
                'name' => $name,
                'email' => strtolower(str_replace(' ', '.', $name)) . '@example.com',
                'password' => $password,
                'role' => 'tutor',
                'status' => 'active',
                'phone' => '980000000' . $index,
            ]);

            TutorProfile::create([
                'user_id' => $tutor->id,
                'bio' => "Professional English tutor with specializing in business English and conversation.",
                'qualification' => 'Bachelor of Arts in English',
                'experience' => rand(2, 10),
                'price' => rand(3000, 8000),
                'tutor_type' => ['home', 'online', 'both'][rand(0, 2)],
                'is_available' => true,
                'auto_accept_nearby' => true,
                'max_auto_accept_distance' => 5,
            ]);

            Location::create([
                'user_id' => $tutor->id,
                'city' => 'Mumbai',
                'state' => 'Maharashtra',
                'area' => 'Andheri',
                'latitude' => 19.1136 + ($index * 0.01),
                'longitude' => 72.8697 + ($index * 0.01),
            ]);

            // Add some availability slots
            AvailabilitySlot::create([
                'tutor_id' => $tutor->id,
                'day_of_week' => 'monday',
                'start_time' => '10:00',
                'end_time' => '12:00',
            ]);

            $tutors[] = $tutor;
        }

        // 2. Create Students
        $students = [];
        $studentNames = ['Sam Wilson', 'Peter Parker', 'Mary Jane', 'Bruce Wayne', 'Clark Kent'];
        
        foreach ($studentNames as $index => $name) {
            $student = User::create([
                'name' => $name,
                'email' => strtolower(str_replace(' ', '.', $name)) . '@example.com',
                'password' => $password,
                'role' => 'student',
                'status' => 'active',
                'phone' => '880000000' . $index,
            ]);
            $students[] = $student;
        }

        // 3. Create Bookings & Attendance
        foreach ($students as $index => $student) {
            $tutor = $tutors[$index]; // Each student books one tutor for demo

            $booking = Booking::create([
                'student_id' => $student->id,
                'tutor_id' => $tutor->id,
                'start_time' => Carbon::now()->subDays(2)->setHour(10)->setMinute(0),
                'end_time' => Carbon::now()->subDays(2)->setHour(11)->setMinute(0),
                'mode' => 'online',
                'status' => 'completed',
            ]);

            // Attendance for completed booking
            Attendance::create([
                'booking_id' => $booking->id,
                'check_in_time' => Carbon::now()->subDays(2)->setHour(10)->setMinute(2),
                'check_out_time' => Carbon::now()->subDays(2)->setHour(11)->setMinute(5),
                'duration' => 63,
                'status' => 'locked',
            ]);

            // Review for completed booking
            Review::create([
                'student_id' => $student->id,
                'tutor_id' => $tutor->id,
                'rating' => rand(4, 5),
                'comment' => "Great teacher! Very patient and helpful.",
            ]);

            // 4. Create Chat and Messages
            $chat = Chat::create([
                'student_id' => $student->id,
                'tutor_id' => $tutor->id,
                'booking_id' => $booking->id,
            ]);

            Message::create([
                'chat_id' => $chat->id,
                'sender_id' => $student->id,
                'message_text' => "Hello teacher, I am looking forward to our class!",
            ]);

            Message::create([
                'chat_id' => $chat->id,
                'sender_id' => $tutor->id,
                'message_text' => "Hello! See you in the class.",
                'is_read' => true,
            ]);
        }
    }
}
