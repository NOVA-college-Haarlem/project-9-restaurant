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
        Schema::table('ingredient_orders', function (Blueprint $table) {
            $table->date('delivery_date')->nullable();
            $table->integer('received_quantity')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('ingredient_orders', function (Blueprint $table) {
            $table->dropColumn('delivery_date');
            $table->dropColumn('received_quantity');
        });
    }
};
