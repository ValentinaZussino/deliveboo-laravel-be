<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->string('slug');
            $table->string('address')->unique();
            $table->string('vat', 11)->unique();
            $table->string('email', 50)->unique();
            $table->string('phone', 20)->nullable();
            $table->time('opening_hours');
            $table->time('closing_hours');
            $table->string('opening_days');
            $table->string('image')->nullable();
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('rating')->nullable();
            $table->foreignId('user_id')->cascadeOnUpdate()->cascadeOnDelete()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
};
