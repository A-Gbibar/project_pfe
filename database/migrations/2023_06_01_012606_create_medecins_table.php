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
        Schema::create('medecins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idSpecialites');
            $table->string('nom');
            $table->string('prenom');
            $table->string('tel' , 10);
            $table->string('ville');
            $table->string('Address');
            $table->foreign('idSpecialites')->references('id')->on('specialites');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medecins');
    }
};
