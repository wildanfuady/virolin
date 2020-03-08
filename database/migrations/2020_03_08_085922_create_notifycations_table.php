<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifycationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifycations', function (Blueprint $table) {
            $table->bigIncrements('notify_id');
            $table->string('notify_subject');
            $table->unsignedBigInteger('promo_id')->nullable();
            $table->unsignedBigInteger('article_id')->nullable();
            $table->timestamps();
            $table->foreign('promo_id')->references('promo_id')->on('promo');
            $table->foreign('article_id')->references('article_id')->on('articles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifycations');
    }
}
