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
            $table->unsignedBigInteger('product_id')->nullable();
            $table->timestamp('order_date');
            $table->timestamp('order_end');
            $table->string('order_status');
            $table->string('order_payment');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('kode_unik');
            $table->bigInteger('promo_id')->unsigned()->nullable();
            $table->dateTime('order_expired')->nullable();
            $table->timestamps();
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('promo_id')->references('promo_id')->on('promo')->onDelete('cascade');
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
