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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->date('start_date')->nullable();
            $table->integer('feel_better')->comment("1 => Yes 2 => No");
            $table->text('areas')->nullable();
            $table->integer('area_not_well')->comment("1 => Yes 2 => No");
            $table->string('what_area_not_well')->nullable();
            $table->integer('cooperative')->comment("1 => Strongly Agree 2 => Agree 3 => No Opinion 4 => Disagre 5 => Strongly Disagree 6 => N/A");
            $table->integer('positive')->comment("1 => Strongly Agree 2 => Agree 3 => No Opinion 4 => Disagre 5 => Strongly Disagree 6 => N/A");
            $table->integer('organized')->comment("1 => Strongly Agree 2 => Agree 3 => No Opinion 4 => Disagre 5 => Strongly Disagree 6 => N/A");
            $table->integer('trouble_less')->comment("1 => Strongly Agree 2 => Agree 3 => No Opinion 4 => Disagre 5 => Strongly Disagree 6 => N/A");
            $table->integer('hanging_street')->comment("1 => Strongly Agree 2 => Agree 3 => No Opinion 4 => Disagre 5 => Strongly Disagree 6 => N/A");
            $table->integer('education')->comment("1 => Strongly Agree 2 => Agree 3 => No Opinion 4 => Disagre 5 => Strongly Disagree 6 => N/A");
            $table->integer('getting_a_job')->comment("1 => Strongly Agree 2 => Agree 3 => No Opinion 4 => Disagre 5 => Strongly Disagree 6 => N/A");
            $table->integer('positive_img')->comment("1 => Strongly Agree 2 => Agree 3 => No Opinion 4 => Disagre 5 => Strongly Disagree 6 => N/A");
            $table->integer('positive_edu')->comment("1 => Strongly Agree 2 => Agree 3 => No Opinion 4 => Disagre 5 => Strongly Disagree 6 => N/A");
            $table->integer('attitude')->comment("1 => Yes 2 => No");
            $table->text('attitude_describe')->nullable();
            $table->text('help_improve')->nullable();
            $table->text('other_comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
