<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('payment_id');
            $table->integer('payment_invoice');
            $table->string('payment_pengirim');
            $table->bigInteger('payment_to_bank');
            $table->integer('payment_total_transfer');
            $table->timestamp('payment_tanggal_transfer');
            $table->string('payment_bukti_transfer')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('payment_status');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
