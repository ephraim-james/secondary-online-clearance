<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clearances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('student_id');
            $table->string('name');
            $table->string('registration_number');
            $table->string('block_number')->nullable();
            $table->string('room_number')->nullable();
            $table->string('level');
            $table
                ->enum('librarian', ['0', '1'])
                ->default('0')
                ->nullable();
            $table
                ->enum('bursar', ['0', '1'])
                ->default('0')
                ->nullable();
            $table
                ->enum('class_teacher', ['0', '1'])
                ->default('0')
                ->nullable();
            $table
                ->enum('matron_patron', ['0', '1'])
                ->default('0')
                ->nullable();
            $table
                ->enum('store_keeper', ['0', '1'])
                ->default('0')
                ->nullable();
            $table
                ->enum('academic_master', ['0', '1'])
                ->default('0')
                ->nullable();
            $table
                ->enum('head_master', ['0', '1'])
                ->default('0')
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clearances');
    }
};