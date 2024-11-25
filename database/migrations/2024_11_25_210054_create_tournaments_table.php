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
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('rules')->nullable();
            $table->string('style');
            $table->string('type');
            $table->json('platforms');
            $table->integer('team_size');
            $table->integer('min_players');
            $table->integer('max_players');
            $table->date('start_date');
            $table->time('start_time');
            $table->string('timezone');
            $table->string('prize')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournaments');
    }
};
