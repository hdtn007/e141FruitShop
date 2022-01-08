<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCountry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_country', function (Blueprint $table) {
            // $table->id();
            $table->increments('country_id');
            $table->string('country_name');
            $table->text('country_desc')->nullable();
            $table->integer('country_author_id')->nullable();
            $table->string('country_ensign')->default('vietnam.png'); // ảnh quốc kỳ
            $table->integer('country_counttag')->default(0);
            $table->string('country_url')->nullable();
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
        Schema::dropIfExists('tbl_country');
    }
}
