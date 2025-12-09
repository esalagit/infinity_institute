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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('tid');
            $table->string('name');
            $table->string('address');
            $table->string('email');
            $table->integer('phone1');
            $table->integer('phone2');
            $table->string('nicf');
            $table->string('nicb');
            $table->string('course1');
            $table->string('course2')->nullable();
            $table->string('subject1');
            $table->string('subject2')->nullable();
            $table->string('subject3')->nullable();
            $table->integer('grade');
            $table->string('class');
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
