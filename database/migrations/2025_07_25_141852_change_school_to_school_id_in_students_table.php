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
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('school_id')->nullable()->after('id');
            $table->string('phone_type')->nullable()->after('zip');
            $table->string('phone')->nullable()->after('phone_type');
            $table->string('parents_phone_type')->nullable()->after('mother');
            $table->string('parents_phone')->nullable()->after('parents_phone_type');
            $table->string('emergency_phone_type')->nullable()->after('relationship_to_student');
            $table->string('emergency_phone')->nullable()->after('emergency_phone_type');
            $table->unsignedBigInteger('last_school_id')->nullable()->after('other_infos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
};
