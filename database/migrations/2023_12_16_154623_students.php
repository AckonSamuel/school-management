<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('student_num');
            $table->date('birthday');
            $table->string('address')->nullable();
            $table->string('parent_phone_number');
            $table->string('second_phone_number')->nullable();
            $table->string('gender');
            $table->date('enrollment_date');
            $table->unsignedBigInteger('classroom_id')->nullable()->constrained();
            $table->foreign('classroom_id')->references('id')->on('classrooms');
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
