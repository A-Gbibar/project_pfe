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
        Schema::create('list_medcins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idMedecin');
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idParent');
            $table->foreign('idMedecin')->references('id')->on('medecins');
            $table->foreign('idUser')->references('id')->on('adultes');
            $table->foreign('idParent')->references('id')->on('parentEnfants');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_medcins');
    }
};
