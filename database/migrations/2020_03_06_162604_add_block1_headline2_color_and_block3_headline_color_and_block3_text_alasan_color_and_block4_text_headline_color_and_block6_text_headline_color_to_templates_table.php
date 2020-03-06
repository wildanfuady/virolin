<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBlock1Headline2ColorAndBlock3HeadlineColorAndBlock3TextAlasanColorAndBlock4TextHeadlineColorAndBlock6TextHeadlineColorToTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('templates', function (Blueprint $table) {
            $table->text('block1_headline2_color')->nullable();
            $table->text('block3_headline_color')->nullable();
            $table->text('block3_text_alasan_color')->nullable();
            $table->text('block4_text_headline_color')->nullable();
            $table->text('block6_text_headline_color')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('templates', function (Blueprint $table) {
            $table->dropColumn('block1_headline2_color');
            $table->dropColumn('block3_headline_color');
            $table->dropColumn('block3_text_alasan_color');
            $table->dropColumn('block4_text_headline_color');
            $table->dropColumn('block6_text_headline_color');
        });
    }
}
