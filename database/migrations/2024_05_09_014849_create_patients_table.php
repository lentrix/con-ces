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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('last_name', 100);
            $table->string('first_name',100);
            $table->date('birth_date');
            $table->enum('gender',['F', 'M']);
            $table->string('address')->nullable();
            $table->string('phone',25)->nullable();
            $table->integer('height'); //cm
            $table->integer('weight'); //kilogram
            $table->string('case_no', 20)->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
