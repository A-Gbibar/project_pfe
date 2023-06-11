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
        Schema::create('parentEnfants', function (Blueprint $table) {
            $table->id();
            $table->enum('typeParent' , ['Pere' , 'Mère']);
            $table->string('nomParent');
            $table->string('PrenomParent');
            $table->string('CINE' , 11 )->unique();
            $table->date('DateNaissanceParent');
            $table->string('telParent' , 10);
            $table->string('Address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
