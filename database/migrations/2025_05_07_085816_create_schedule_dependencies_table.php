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
        Schema::create('schedule_dependencies', function (Blueprint $table) {   
            $table->id();
            
            $table->unsignedBigInteger('schedule_id');
            $table->foreign('schedule_id')
                ->references('id')
                ->on('schedules')
                ->onDelete('cascade');
            $table->unsignedBigInteger('dependent_schedule_id');
            $table->foreign('dependent_schedule_id')
                ->references('id')
                ->on('schedules')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_dependencies');
    }
};
