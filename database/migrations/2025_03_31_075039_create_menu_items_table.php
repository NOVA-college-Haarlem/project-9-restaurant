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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable(); // Beschrijving van het menu-item
            $table->decimal('prijs', 8, 2)->nullable(); // Verkoopprijs optioneel
            $table->decimal('cost', 8, 2)->nullable(); // Productiekosten optioneel
            $table->integer('popularity')->default(0); // Hoe vaak verkocht
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
