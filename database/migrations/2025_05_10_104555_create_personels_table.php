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
    Schema::create('personels', function (Blueprint $table) {
        $table->id();
        $table->string('personel_no')->unique();
        $table->string('first_name');
        $table->string('last_name');
        $table->date('birth_date')->nullable();
        $table->string('gender')->nullable();
        $table->string('marital_status')->nullable();
        $table->string('photo')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personels');
    }
};
