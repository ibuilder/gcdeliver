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
       Schema::table('deliveries', function (Blueprint $table) {
           $table->date('estimated_delivery_date')->nullable();
           $table->date('actual_delivery_date')->nullable();
           $table->string('tracking_number')->nullable();
       });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
       Schema::table('deliveries', function (Blueprint $table) {
           $table->dropColumn('estimated_delivery_date');
           $table->dropColumn('actual_delivery_date');
           $table->dropColumn('tracking_number');
       });
   }
};
