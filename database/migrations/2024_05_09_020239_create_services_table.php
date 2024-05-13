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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('patient_id')->unsigned();
            $table->date('date');
            $table->string('complaints');
            $table->integer('temp'); //celsius
            $table->integer('sys')->nullable();
            $table->integer('dias')->nullable();
            $table->string('rr',15)->nullable();
            $table->string('pr',15)->nullable();
            $table->string('cbs',15)->nullable();
            $table->decimal('bmi',5,2)->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
