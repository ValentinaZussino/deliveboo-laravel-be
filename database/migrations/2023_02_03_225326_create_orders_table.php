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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->string('last_name', 30);
            $table->string('email', 100);
            $table->string('address', 100);
            $table->string('phone', 20)->nullable();
            $table->float('total_amount', 6, 2)->unsigned();
            $table->boolean('payed');
            $table->date('date');
            $table->foreignId('restaurant_id')->cascadeOnUpdate()->cascadeOnDelete()->constrained();
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
        Schema::dropIfExists('orders');
    }
};
