<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            
            $table->bigIncrements('template_id');

            $table->text('block1_bg')->nullable();
            $table->text('block1_headline1')->nullable();
            $table->text('block1_headline2')->nullable();
            $table->text('block1_btn_text')->nullable();
            $table->text('block1_btn_text_color')->nullable();
            $table->text('block1_btn_text_bg')->nullable();
            $table->text('block1_headline1_color')->nullable();
            $table->text('block1_headline2_color')->nullable();

            $table->text('block2_text_edukasi')->nullable();

            $table->text('block3_bg')->nullable();
            $table->text('block3_headline')->nullable();
            $table->text('block3_image')->nullable();
            $table->text('block3_alasan1_icon')->nullable();
            $table->text('block3_alasan1_text')->nullable();
            $table->text('block3_alasan2_icon')->nullable();
            $table->text('block3_alasan2_text')->nullable();
            $table->text('block3_alasan3_icon')->nullable();
            $table->text('block3_alasan3_text')->nullable();
            $table->text('block3_alasan4_icon')->nullable();
            $table->text('block3_alasan4_text')->nullable();
            $table->text('block3_headline_color')->nullable();
            $table->text('block3_text_alasan_color')->nullable();

            $table->text('block4_bg')->nullable();
            $table->text('block4_bg_headline')->nullable();
            $table->text('block4_text_headline')->nullable();
            $table->text('block4_text_headline_desc')->nullable();
            $table->text('block4_image')->nullable();
            $table->text('block4_text_headline_color')->nullable();
            $table->text('block4_text_headline_desc_color')->nullable();

            $table->text('block5_bg')->nullable();
            $table->text('block5_text')->nullable();
            $table->text('block5_text_color')->nullable();

            $table->text('block6_bg')->nullable();
            $table->text('block6_text_headline')->nullable();
            $table->text('block6_image')->nullable();
            $table->text('block6_text_headline_color')->nullable();

            $table->text('block7_faq')->nullable();

            $table->text('block8_bg')->nullable();
            $table->text('block8_headline')->nullable();
            $table->text('block8_text_button')->nullable();
            $table->text('block8_text_color_button')->nullable();
            $table->text('block8_button_bg_color')->nullable();

            $table->index('template_id');

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
        Schema::dropIfExists('templates');
    }
}
