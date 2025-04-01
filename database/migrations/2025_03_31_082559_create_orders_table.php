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
        $table->unsignedBigInteger('user_id');
        $table->enum('status', ['pending', 'accepted', 'rejected', 'completed'])->default('pending');
        $table->string('delivery_type');
        $table->decimal('total_price', 8, 2);
        $table->json('order_items'); 
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
