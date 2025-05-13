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
            $table->string('rfid_demet1')->nullable()->after('rfid_operasyon');
            $table->string('rfid_demet2')->nullable()->after('rfid_demet1');
            $table->string('rfid_demet3')->nullable()->after('rfid_demet2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rfid_sessions', function (Blueprint $table) {
            $table->dropColumn(['rfid_demet1', 'rfid_demet2', 'rfid_demet3']);
        });
    }
};
