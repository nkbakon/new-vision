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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();            
            $table->string('gender')->nullable();
            $table->string('ethnicity')->nullable();
            $table->string('age')->nullable();
            $table->date('dob')->nullable();
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->string('student_lives_with');
            $table->string('gpa')->nullable();
            $table->string('counselor')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('relationship_to_student')->nullable();
            $table->string('guardian_email')->nullable();
            $table->string('student_email')->nullable();
            $table->text('lives')->nullable();
            $table->integer('contact_with_police')->comment("1 => Yes 2 => No");
            $table->text('explain_contact_with_police')->nullable();
            $table->text('court_involement')->nullable();
            $table->integer('incarcerated')->comment("1 => Yes 2 => No");
            $table->text('explain_incarcerated')->nullable();
            $table->text('events')->nullable();
            $table->text('other_infos')->nullable();
            $table->text('previous_conducts')->nullable();
            $table->string('suspended_time')->nullable();
            $table->integer('ever_expelled')->comment("1 => Yes 2 => No");
            $table->text('explain_ever_expelled')->nullable();
            $table->text('additional_info')->nullable();
            $table->string('advisor')->nullable();
            $table->longtext('parent_signature')->nullable();
            $table->longtext('student_signature')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
