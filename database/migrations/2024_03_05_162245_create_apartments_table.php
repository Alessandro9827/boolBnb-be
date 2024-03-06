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
            $table->text('title');
            $table->tinyInteger('no_rooms')->unsigned();
            $table->tinyInteger('no_beds')->unsigned();
            $table->tinyInteger('no_bathrooms')->unsigned();
            $table->smallInteger('square_meters')->unsigned();
            $table->text('address') -> nullable();
            $table->text('imgs')->nullable();
            $table->boolean('visible');
            $table->decimal('latitude', 11,8)->nullable();
            $table->decimal('longitude', 11,8)->nullable();
            $table->decimal('price', 7, 2, true);
            $table->mediumText('description');
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
