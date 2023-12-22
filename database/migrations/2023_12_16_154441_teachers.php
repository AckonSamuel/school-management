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
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('teacher_num');
            $table->date('birthday');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->text('photo_path')->nullable();
            $table->string('address')->nullable();
            $table->string('gender');
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
        Schema::dropIfExists('teachers');
    }
};
