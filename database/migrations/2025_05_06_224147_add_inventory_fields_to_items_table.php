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
         Schema::table('items', function (Blueprint $table) {
            $table->integer('stock_level')->nullable();
            $table->integer('reorder_point')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void 
    {
         Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('stock_level');
            $table->dropColumn('reorder_point');
        });
    }
};
