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
            $table->string('campaign');
            $table->unsignedBigInteger('campaign_template')->nullable();
            $table->enum('campaign_form_hp', ['Ya', 'Tidak']);
            $table->enum('campaign_form_address', ['Ya', 'Tidak']);
            $table->text('campaign_subject_confirm_email');
            $table->text('campaign_confirm');
            $table->text('campaign_subject_thank_email');
            $table->text('campaign_form_thank');
            $table->text('campaign_text_share');
            $table->integer('campaign_form_view');
            $table->integer('campaign_group');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->integer('campaign_share');
            $table->timestamps();

            $table->index('campaign_template');
            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('campaign_template')->references('template_id')->on('templates')->onDelete('cascade');
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
