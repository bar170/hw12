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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_at')->index();
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('transport_id');
            $table->unsignedBigInteger('route_id');
            $table->timestamps();

            $table->foreign('driver_id')
                ->references('id')
                ->on('members')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('transport_id')
                ->references('id')
                ->on('transports')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('route_id')
                ->references('id')
                ->on('routes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
