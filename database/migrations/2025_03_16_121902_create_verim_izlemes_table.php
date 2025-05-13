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
        Schema::create('verim_izlemes', function (Blueprint $table) {
            $table->id();
            $table->string('line');
            $table->string('persNo');
            $table->string('persAdi');
            $table->string('persSoyadi');
            $table->integer('gunSure');
            $table->integer('gerceklesenDakika');
            $table->integer('kayipDakika');
            $table->float('kisiselVerimlilik');
            $table->float('isletmeyeKatkıverimlilik');
            $table->string('personelGorevi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verim_izlemes');
    }
};
