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
        Schema::create('observation', function (Blueprint $table) {
            $table->id();
              $table->unsignedBigInteger('station_id')->nullable();
    $table->unsignedBigInteger('observer_id')->nullable();

    $table->dateTime('date');
    $table->date('observation_date');
    $table->decimal('min_temperature', 5, 2)->nullable();
    $table->decimal('max_temperature', 5, 2)->nullable();
    $table->decimal('rainfall', 5, 2)->nullable();
    $table->timestamps();

    // Correct foreign key syntax with onDelete('set null')
   $table->foreign('station_id')
      ->references('id')->on('stations')
      ->onDelete('set null');

    $table->foreign('observer_id')
      ->references('observer_id')->on('users')
      ->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('observation');
    }
};
