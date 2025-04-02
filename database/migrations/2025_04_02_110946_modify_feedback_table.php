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
        Schema::table('feedback', function (Blueprint $table) {
            // Verwijder de foreign key constraint eerst als die bestaat
            $table->dropForeign(['user_id']);

            // Maak de kolom nullable en verander het type
            $table->string('user_name')->nullable()->after('id');
            $table->string('user_email')->nullable()->after('user_name');
            $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('feedback', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->dropColumn(['user_name', 'user_email']);
        });
    }
};
