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
        Schema::create('selections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('time_to_contact')->nullable();
            $table->string('teachers_name')->nullable();
            $table->string('teachers_contact')->nullable();
            $table->string('referring_student')->nullable();
            $table->text('reasons')->nullable();
            $table->text('strong_points')->nullable();
            $table->text('success_like')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selections');
    }
};
