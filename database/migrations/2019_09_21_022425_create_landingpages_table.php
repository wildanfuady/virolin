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
            $table->string('lp_header_layout');
            $table->string('lp_header_title');
            $table->text('lp_header_content');
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
