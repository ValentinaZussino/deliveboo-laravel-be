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
        Schema::create('plates', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug')->unique();
            $table->float('price', 6,2)->unsigned();
            $table->boolean('available')->default(1);
            $table->string('image')->nullable();
            $table->text('ingredients');
            $table->string('allergens')->nullable();
            $table->string('size', 30)->nullable();
            $table->foreignId('restaurant_id')->cascadeOnUpdate()->cascadeOnDelete()->constrained();
            $table->foreignId('category_id')->cascadeOnUpdate()->cascadeOnDelete()->constrained();
            $table->softDeletes();
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
        Schema::dropIfExists('plates');
    }
};
