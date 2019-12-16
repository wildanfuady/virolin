<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandingpagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landingpages', function (Blueprint $table) {
            $table->bigIncrements('lp_id');
            $table->string('lp_name');
            $table->string('lp_slug');
            $table->enum('lp_status', ['Active', 'Inactive']);
            $table->bigInteger('user_id');
            $table->bigInteger('list_sub_id');
            $table->bigInteger('form_id');
            $table->bigInteger('autoresponder_id');
            $table->string('lp_header_image');
            $table->string('lp_header_title');
            $table->text('lp_header_content');
            $table->string('lp_header_background');
            $table->string('lp_image_video_primary');
            $table->string('lp_image_video_opening');
            $table->string('lp_paralax_cta');
            $table->text('lp_description');
            $table->integer('testimoni_1');
            $table->integer('testimoni_2');
            $table->integer('testimoni_3');
            $table->string('trust_title');
            $table->string('trust_image');
            $table->text('trust_content');
            $table->string('cta_title');
            $table->string('cta_button_name');
            $table->string('cta_button_link');
            $table->enum('status_all', ['Publish', 'Draf']);
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
        Schema::dropIfExists('landingpages');
    }
}
