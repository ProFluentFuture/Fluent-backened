<?php

namespace Database\Seeders;

use App\Models\EmailTemplate;
use Illuminate\Database\Seeder;

class EmailTemplateSeeder extends Seeder
{
    public function run(): void
    {
        $templates = [
            [
                'slug' => 'tutor_approved',
                'subject' => 'Welcome to English LMS - Your Account is Approved!',
                'body' => "Hi {name},\n\nCongratulations! Your tutor account has been approved by our admin team.\n\nYou can now log in to your dashboard and start managing your classes.\n\nDashboard Link: {dashboard_link}\n\nHappy Teaching!",
                'description' => 'Sent to tutors when their account is approved by admin.',
            ],
            [
                'slug' => 'tutor_rejected',
                'subject' => 'Update on your Tutor Application - English LMS',
                'body' => "Hi {name},\n\nThank you for your interest in joining English LMS. Unfortunately, your tutor application has been rejected at this time.\n\nReason: {reason}\n\nBest regards,\nEnglish LMS Team",
                'description' => 'Sent to tutors when their account is rejected by admin.',
            ],
            [
                'slug' => 'new_booking',
                'subject' => 'New Booking Received from {student_name}',
                'body' => "Hi {tutor_name},\n\nYou have received a new booking from {student_name}!\n\nSchedule: {timing}\nMode: {mode}\nAddress: {address}\n\nPlease log in to your dashboard to accept or manage this booking.\n\nDashboard Link: {dashboard_link}",
                'description' => 'Sent to tutors when a student books a new class.',
            ],
        ];

        foreach ($templates as $template) {
            EmailTemplate::updateOrCreate(['slug' => $template['slug']], $template);
        }
    }
}
