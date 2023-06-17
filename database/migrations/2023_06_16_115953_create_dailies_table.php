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
        Schema::create('dailies', function (Blueprint $table) {
            $table->id();
            $table->date('DateHoraires');
            $table->string('HoureStart');
            $table->string('HoureFin');
            $table->string('UserNameUser');
            $table->unsignedBigInteger('idU');
            $table->string('UserNameDocter');
            $table->string('idD');
            $table->string('description')->nullable();
            $table->foreign('idD')->references('idMedecins')->on('medecins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dailies');
    }
};
