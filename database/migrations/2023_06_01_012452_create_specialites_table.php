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
        Schema::create('specialites', function (Blueprint $table) {
            $table->id();
            $table->string('Typespecialite');
            $table->string('photoSpecialites');
            $table->string('Description');
            $table->string('problim');
            $table->string('photo1');
            $table->string('Desphoto1');
            $table->string('photo2');
            $table->string('Desphoto2');
            $table->string('photo3');
            $table->string('Desphoto3');
            $table->string('LinkVideo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialites');
    }
};
