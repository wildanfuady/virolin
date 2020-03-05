<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo', function (Blueprint $table) {
            $table->bigIncrements('promo_id');
            $table->string('promo_title');
            $table->string('promo_slug');
            $table->text('promo_content');
            $table->date('promo_start');
            $table->date('promo_end');
            $table->string('promo_code');
            $table->bigInteger('promo_percent');
            $table->enum('promo_status', ['Active', 'Inactive']);
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
        Schema::dropIfExists('promo');
    }
}
