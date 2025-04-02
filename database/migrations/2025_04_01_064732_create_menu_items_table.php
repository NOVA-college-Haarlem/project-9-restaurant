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
            $table->id(); // Auto-increment id voor elk gerecht
            $table->string('name'); // Naam van het gerecht
            $table->text('description')->nullable(); // Beschrijving van het gerecht (optioneel)
            $table->decimal('price', 8, 2); // Prijs van het gerecht
            $table->timestamps(); // created_at en updated_at kolommen
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items'); // Verwijder de menu_items tabel bij terugdraaien van de migratie
    }
};
