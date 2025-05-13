<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
       public function up()
    {
        Schema::create('models', function (Blueprint $table) {
            $table->id(); // Auto-increment ID
            $table->string('siparis_no'); // Sipariş No
            $table->string('musteri_siparis_no'); // Müşteri Sipariş No
            $table->string('model_kodu'); // Model Kodu
            $table->string('urun_adi'); // Ürün Adı
            $table->timestamps(); // created_at ve updated_at zaman damgaları
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_ekles');
    }
};
