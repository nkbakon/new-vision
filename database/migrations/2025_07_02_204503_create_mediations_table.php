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
        Schema::create('mediations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id1')->nullable();
            $table->unsignedBigInteger('student_id2')->nullable();
            $table->unsignedBigInteger('student_id3')->nullable();
            $table->unsignedBigInteger('student_id4')->nullable();
            $table->string('referred_by')->nullable();
            $table->date('date')->nullable();
            $table->text('incident')->nullable();
            $table->text('outcomes')->nullable();
            $table->text('outcome_explain')->nullable();
            $table->text('referral')->nullable();
            $table->longtext('s_signature1')->nullable();
            $table->longtext('s_signature2')->nullable();
            $table->longtext('s_signature3')->nullable();
            $table->longtext('s_signature4')->nullable();
            $table->longtext('staff_signature1')->nullable();
            $table->longtext('staff_signature2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mediations');
    }
};
