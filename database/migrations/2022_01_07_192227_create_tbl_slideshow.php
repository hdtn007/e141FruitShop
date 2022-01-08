<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSlideshow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_slideshow', function (Blueprint $table) {
            // $table->id();
            $table->increments('slide_id');
            $table->string('slide_title');
            $table->text('slide_desc');
            $table->string('slide_image');
            $table->string('slide_url');
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
        Schema::dropIfExists('tbl_slideshow');
    }
}
