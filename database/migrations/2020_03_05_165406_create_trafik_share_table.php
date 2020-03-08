<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrafikShareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trafik_share', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('trafik_ip');
            $table->string('trafik_browser');
            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('trafik_share');
    }
}
