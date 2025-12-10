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
        Schema::create('passenger_state', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('passenger_id');
            $table->unsignedBigInteger('state_id');
            $table->timestamps();

            $table->foreign('passenger_id')
                ->references('id')
                ->on('passengers')
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
        Schema::dropIfExists('passenger_state');
    }
};
