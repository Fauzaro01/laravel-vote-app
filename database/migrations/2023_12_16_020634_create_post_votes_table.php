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
        Schema::create('post_votes', function (Blueprint $table) {
            $table->string('id', 13)->primary();
            $table->string('user_id', 13);
            $table->string('vote_id', 13);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('vote_id')->references('id')->on('votes');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_votes');
    }
};
