<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_subscribers', function (Blueprint $table) {
            $table->bigIncrements('list_sub_id');
            $table->string('list_sub_name');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->enum('list_sub_status', ['Active', 'Inactive']);
            $table->timestamps();
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
        Schema::dropIfExists('list_subscribers');
    }
}
