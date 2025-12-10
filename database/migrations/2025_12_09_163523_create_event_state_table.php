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
        Schema::create('event_state', function (Blueprint $table) {
            $table->id();   
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('state_id');
            $table->timestamps();

            $table->foreign('event_id')
                ->references('id')
                ->on('events')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('state_id')
                ->references('id')
                ->on('states')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_state');
    }
};
