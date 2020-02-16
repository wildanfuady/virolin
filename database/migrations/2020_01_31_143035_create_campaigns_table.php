<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->bigIncrements('campaign_id');
            $table->string('campaign_slug');
            $table->string('campaign_name');
            $table->text('campaign_template');
            $table->enum('campaign_form_hp', ['Ya', 'Tidak']);
            $table->enum('campaign_form_address', ['Ya', 'Tidak']);
            $table->text('campaign_form_thank');
            $table->integer('campaign_form_view');
            $table->integer('user_id');
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
        Schema::dropIfExists('campaigns');
    }
}
