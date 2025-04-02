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
        Schema::table('shifts', function (Blueprint $table) {
            // Make user_id nullable
            $table->foreignId('user_id')->nullable()->change();

            // Modify the status enum
            $table->enum('status', ['unassigned', 'assigned', 'worked'])
                ->default('unassigned')
                ->change();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('shifts', function (Blueprint $table) {
            // Revert user_id to not nullable
            $table->foreignId('user_id')->nullable(false)->change();

            // Revert status enum
            $table->enum('status', ['assigned', 'worked'])
                ->default('assigned')
                ->change();
        });
    }
};
