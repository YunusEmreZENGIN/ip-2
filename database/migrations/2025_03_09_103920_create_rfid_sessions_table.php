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
        Schema::create('rfid_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('rfid_personel')->nullable();
            $table->string('rfid_operasyon')->nullable();
            $table->string('rfid_demet')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rfid_sessions');
    }
};
