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
        Schema::create('enfants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idClient')->unique();
            $table->unsignedBigInteger('idParent');
            $table->string('type');
            $table->string('nom');
            $table->string('Prenom');
            $table->string('UserName')->nullable();
            $table->enum('Sexe' , ['Femme' , 'Homme']);
            $table->date('DateNaissance');
            $table->string('tel' , 10)->nullable();
            $table->string('Diagnostique')->nullable();
            $table->string('Medecin')->nullable();
            $table->string('photo')->nullable();
            $table->foreign('idParent')->references('id')->on('parentEnfants');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enfants');
    }
};
