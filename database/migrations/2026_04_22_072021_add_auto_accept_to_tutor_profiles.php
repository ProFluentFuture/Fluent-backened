<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tutor_profiles', function (Blueprint $table) {
            $table->boolean('auto_accept_nearby')->default(false)->after('is_available');
            $table->decimal('max_auto_accept_distance', 8, 2)->default(5.00)->after('auto_accept_nearby'); // in KM
        });
    }

    public function down(): void
    {
        Schema::table('tutor_profiles', function (Blueprint $table) {
            $table->dropColumn(['auto_accept_nearby', 'max_auto_accept_distance']);
        });
    }
};
