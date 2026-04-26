<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tutor_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('bio')->nullable();
            $table->string('qualification')->nullable();
            $table->integer('experience')->default(0); // Years
            $table->decimal('price', 8, 2)->default(0.00);
            $table->enum('demo_class_type', ['free', 'paid', 'none'])->default('none');
            $table->boolean('is_available')->default(true);
            $table->enum('tutor_type', ['home', 'online', 'both']);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor_profiles');
    }
};
