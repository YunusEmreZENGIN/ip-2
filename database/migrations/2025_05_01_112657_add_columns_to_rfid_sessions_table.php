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
        Schema::table('rfid_sessions', function (Blueprint $table) {
            $table->string('production_order')->nullable();
            $table->string('customer_order')->nullable();
            $table->string('model_code')->nullable();
            $table->string('product')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('rfid_sessions', function (Blueprint $table) {
            $table->dropColumn(['production_order', 'customer_order', 'model_code', 'product']);
        });
    }
};
