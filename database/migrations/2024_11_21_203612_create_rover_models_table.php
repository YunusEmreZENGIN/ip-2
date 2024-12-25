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
        Schema::create('rover_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('rover_id');
            $table->unsignedInteger('operator_id');
            $table->unsignedInteger('bundle_id');
            $table->unsignedInteger('effiency');
            $table->unsignedInteger('processed_units');
            $table->string('operation_name');
            $table->unsignedInteger('quality');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rover_models');
    }
};
