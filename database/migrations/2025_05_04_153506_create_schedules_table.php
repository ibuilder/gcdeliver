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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('task_name');
            $table->unsignedInteger('duration');
            $table->unsignedInteger('progress');
            $table->date('start_date');
            $table->date('end_date');
            
            $table->unsignedBigInteger('project_id')->nullable();
            $table->timestamps();
            $table->foreign('project_id')->nullable()->references('id')->on('projects');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
