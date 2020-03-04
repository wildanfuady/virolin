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
            $table->integer('user_id');
            $table->integer('campaign_id');
            $table->integer('list_sub_id');
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
        Schema::dropIfExists('subscribers');
    }
}
