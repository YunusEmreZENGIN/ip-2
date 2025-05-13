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
        Schema::create('get_data_pages', function (Blueprint $table) {
            $table->id();
            $table->string('operasyon_adi')->nullable();
            $table->string('operator_adi')->nullable();
            $table->string('demet_numrasi')->nullable();
            $table->integer('hedef_adet')->nullable();
            $table->integer('saat_09_15')->nullable();
            $table->integer('saat_10_15')->nullable();
            $table->integer('saat_11_30')->nullable();
            $table->integer('saat_12_30')->nullable();
            $table->integer('saat_13_30')->nullable();
            $table->integer('saat_15_15')->nullable();
            $table->integer('saat_16_15')->nullable();
            $table->integer('saat_17_30')->nullable();
            $table->integer('saat_18_30')->nullable();
            $table->integer('toplam_adet')->nullable();
            $table->integer('yüzde_verimlilik')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_data_pages');
    }
};
