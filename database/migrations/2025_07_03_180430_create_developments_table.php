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
        Schema::create('developments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->date('enrollment_date')->nullable();
            $table->string('referred_by')->nullable();
            $table->text('categories')->nullable();
            $table->text('sessions')->nullable();
            $table->string('advisor')->nullable();
            $table->date('date')->nullable();
            $table->string('goal')->nullable();
            $table->text('motivation')->nullable();
            $table->text('action_step')->nullable();
            $table->text('barrier')->nullable();
            $table->text('strategy')->nullable();
            $table->text('award')->nullable();
            $table->text('comment')->nullable();
            $table->integer('was_goal')->comment("1 => Yes 2 => No");
            $table->date('date_goal')->nullable();
            $table->longtext('student_signature')->nullable();
            $table->longtext('mentor_signature')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developments');
    }
};
