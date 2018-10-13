<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdersDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordersDetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orders_id')->unsigned();
            $table->integer('stock_id');
            $table->integer('quantity');
            $table->integer('amount');
            $table->foreign('orders_id')->references('id')->on('orders');
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
        Schema::dropIfExists('ordersDetails');
    }
}
