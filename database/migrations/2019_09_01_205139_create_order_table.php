<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('invoice');
            $table->unsignedBigInteger('product_id');
            $table->timestamp('order_date');
            $table->timestamp('order_end');
            $table->string('order_status');
            $table->string('order_payment');
            $table->unsignedBigInteger('user_id');
            $table->integer('kode_unik');
            $table->timestamps();
            // $table->foreign('product_id')->references('product_id')->on('products');
            $table->foreign('user_id')->references('id')->on('users');
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
}
