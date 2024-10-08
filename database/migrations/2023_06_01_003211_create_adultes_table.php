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
        Schema::create('adultes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idClient')->unique();
            $table->string('type');
            $table->string('nom');
            $table->string('Prenom');
            $table->string('UserName')->nullable();
            $table->string('CINE' , 11 )->unique();
            $table->enum('Sexe' , ['Femme' , 'Homme']);
            $table->date('DateNaissance');
            $table->string('tel' , 10);
            $table->string('Address');
            $table->string('Medecin')->nullable();
            $table->string('Diagnostique')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adultes');
    }
};
