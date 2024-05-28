<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Meal;
use App\Models\Restaurant;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('meal_id');

            $table->foreign('restaurant_id')->references('id')->on("restaurant");
            $table->foreign('meal_id')->references('id')->on("meal");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
