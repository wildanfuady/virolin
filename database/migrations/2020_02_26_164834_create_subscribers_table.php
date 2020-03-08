<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subscriber_name', 35);
            $table->string('subscriber_email', 50);
            $table->string('subscriber_nohp', 50);
            $table->text('subscriber_alamat');
            $table->string('subscriber_verifikasi', 150);
            $table->enum('subscriber_status', ['valid', 'invalid']);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->unsignedBigInteger('list_sub_id')->nullable();
            $table->timestamps();
            $table->foreign('list_sub_id')->references('list_sub_id')->on('list_subscribers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('campaign_id')->references('campaign_id')->on('campaigns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscribers');
    }
}
