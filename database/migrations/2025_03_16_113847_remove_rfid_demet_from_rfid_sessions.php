<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('rfid_sessions', function (Blueprint $table) {
            $table->dropColumn('rfid_demet');
        });
    }

    public function down()
    {
        Schema::table('rfid_sessions', function (Blueprint $table) {
            $table->string('rfid_demet')->nullable();
        });
    }
};