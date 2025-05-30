<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('delivery_items', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('delivery_id')->unsigned();
            $table->unsignedBigInteger('item_id')->unsigned();

            $table->foreign('delivery_id')->references('id')->on('deliveries');
            $table->foreign('item_id')->references('id')->on('items');

            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_items');
    }
};
