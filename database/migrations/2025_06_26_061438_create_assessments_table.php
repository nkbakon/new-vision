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
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->text('areas')->nullable();
            $table->text('relationships')->nullable();
            $table->string('cooperative')->nullable();
            $table->string('grades_fine')->nullable();
            $table->string('school_attitude')->nullable();
            $table->string('interested_in_education')->nullable();
            $table->string('work_well_with_students')->nullable();
            $table->string('satisfied_with_friends')->nullable();
            $table->string('do_homework')->nullable();
            $table->string('life_attitude')->nullable();
            $table->string('dont_hang_street')->nullable();
            $table->string('cooperative_with_parent')->nullable();
            $table->string('dont_get_trouble')->nullable();
            $table->string('getting_job')->nullable();
            $table->integer('have_you_stopped')->comment("1 => Yes 2 => No");
            $table->integer('stop_fair')->comment("1 => Yes 2 => No");
            $table->integer('happend_result')->comment("1 => Let go right away 2 => Given a ticket or warning 3 => Taken to police station and then released 4 => Required to go to court 5 => Sent to a detention facility 6 => Sent to jail 7 => Sent to prison 8 => Other");
            $table->string('happend_result_other')->nullable();
            $table->string('school')->nullable();
            $table->longtext('signature')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
