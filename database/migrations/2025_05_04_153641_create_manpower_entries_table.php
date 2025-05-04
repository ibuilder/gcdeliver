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
        Schema::create('manpower_entries', function (Blueprint $table) {
            $table->id();           
            $table->unsignedBigInteger('daily_report_id');
            $table->foreign('daily_report_id')->references('id')->on('daily_reports');
            $table->string('role');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manpower_entries');
    }
};
