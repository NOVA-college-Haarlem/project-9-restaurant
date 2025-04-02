<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Gebruik foreignId voor user_id
            $table->enum('status', ['pending', 'accepted', 'rejected', 'completed'])->default('pending');
            $table->string('delivery_type');
            $table->decimal('total_price', 8, 2);
            $table->timestamps();
        });
        
        
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
