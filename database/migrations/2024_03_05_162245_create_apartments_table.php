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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->tinyInteger('no_rooms')->unsigned();
            $table->tinyInteger('no_beds')->unsigned();
            $table->tinyInteger('no_bathrooms')->unsigned();
            $table->tinyInteger('square_meters')->unsigned();
            $table->string('address');
            $table->text('img');
            $table->boolean('visible');
            $table->decimal('latitude', 11,8);
            $table->decimal('longitude', 11,8);
            $table->float('price');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
