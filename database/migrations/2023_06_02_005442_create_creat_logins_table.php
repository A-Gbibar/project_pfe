<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Fortify\Fortify;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('creat_logins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idAdulte')->nullable();
            $table->unsignedBigInteger('idEnfant')->nullable();
            $table->string('UserName');
            $table->string('login');
            if (Fortify::confirmsTwoFactorAuthentication()) {
                $table->timestamp('two_factor_confirmed_at')
                        ->after('login')
                        ->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creat_logins');
    }
};
