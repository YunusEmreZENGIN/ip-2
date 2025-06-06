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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('line');
            $table->string('productionOrder');
            $table->string('customerOrder');
            $table->string('modelCode');
            $table->string('product');
            $table->string('operator');
            $table->string('operation');
            $table->integer('quantity');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports_models');
    }
};
