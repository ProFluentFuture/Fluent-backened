<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, add the status column
        Schema::table('users', function (Blueprint $table) {
            $table->enum('status', ['active', 'pending', 'rejected'])->default('active')->after('role');
        });

        // Then update the role enum. 
        // Note: In MySQL, changing an enum usually requires a raw statement or doctrine/dbal.
        // We'll use a raw statement for reliability.
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin', 'student', 'tutor') DEFAULT 'student'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin', 'student') DEFAULT 'student'");
    }
};
