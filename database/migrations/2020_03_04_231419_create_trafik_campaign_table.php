<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrafikCampaignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trafik_campaign', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('trafik_ip');
            $table->string('trafik_browser');
            $table->string('trafik_medium')->nullable();
            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->timestamps();
            $table->foreign('campaign_id')->references('campaign_id')->on('campaigns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trafik_campaign');
    }
}
