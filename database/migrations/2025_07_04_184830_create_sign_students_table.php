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
        Schema::create('sign_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sign_id')->nullable();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->integer('participant')->comment("1 => Yes 2 => No");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sign_students');
    }
};
