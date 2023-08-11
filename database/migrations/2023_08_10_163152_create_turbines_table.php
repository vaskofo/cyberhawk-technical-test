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
        Schema::create('turbines', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            //Considered using a pivot table for the grades, but it would be unnecessary
            //since all the models have these grades.
            $table->integer('blade_grade');
            $table->integer('rotor_grade');
            $table->integer('hub_grade');
            $table->integer('generator_grade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turbines');
    }
};
