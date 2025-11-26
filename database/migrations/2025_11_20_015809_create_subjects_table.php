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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->String('ccode');
            $table->String('subid1');
            $table->String('subname1');
            $table->String('subid2')->nullable();
            $table->String('subname2')->nullable();
            $table->String('subid3')->nullable();
            $table->String('subname3')->nullable();
            $table->string('subid4')->nullable();
            $table->String('subname4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
