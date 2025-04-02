<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('menu_items', function (Blueprint $table) {
            $table->integer('calories')->nullable();
            $table->decimal('protein', 5, 2)->nullable(); // in gram
            $table->decimal('carbs', 5, 2)->nullable(); // in gram
            $table->decimal('fat', 5, 2)->nullable(); // in gram
            $table->text('allergens')->nullable();
            $table->boolean('vegetarian')->default(false);
            $table->boolean('vegan')->default(false);
            $table->boolean('gluten_free')->default(false);
        });
    }

    public function down()
    {
        Schema::table('menu_items', function (Blueprint $table) {
            $table->dropColumn(['calories', 'protein', 'carbs', 'fat', 'allergens', 'vegetarian', 'vegan', 'gluten_free']);
        });
    }
};
