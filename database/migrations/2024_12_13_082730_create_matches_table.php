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
            Schema::create('matches', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('team1_id'); // Example for an unsigned big integer
                $table->unsignedBigInteger('team2_id');
                $table->integer('team1_score')->nullable();
                $table->integer('team2_score')->nullable();
                $table->text('field');
                $table->unsignedBigInteger('referee_id');

                $table->foreign('referee_id')
                      ->references('id')
                      ->on('users');
                $table->string('time');
                $table->timestamps();
            });
        }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
