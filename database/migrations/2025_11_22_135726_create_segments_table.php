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
        // Отрезок маршрута
        Schema::create('segments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('cost')->nullable();
            $table->integer('order'); // Порядковый номер отрезка на маршруте
            $table->unsignedBigInteger('start_id');
            $table->unsignedBigInteger('end_id');
            $table->unsignedBigInteger('route_id');
            $table->timestamps();


            $table->foreign('start_id')
                ->references('id')
                ->on('breakpoints')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('end_id')
                ->references('id')
                ->on('breakpoints')
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
        Schema::dropIfExists('segments');
    }
};
