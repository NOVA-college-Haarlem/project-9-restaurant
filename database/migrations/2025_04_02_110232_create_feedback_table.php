<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('rating'); // Schaal 1-10
            $table->text('food_comment')->nullable();
            $table->text('service_comment')->nullable();
            $table->text('ambiance_comment')->nullable();
            $table->string('photo_path')->nullable(); // Voor opslaan van foto's
            $table->boolean('is_public')->default(true); // Publiek of prive
            $table->text('admin_response')->nullable(); // Reactie van restaurant
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
