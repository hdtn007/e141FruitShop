<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCategoryProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_category_product', function (Blueprint $table) {
            // $table->id();
            $table->increments('category_id');
            $table->string('category_sub')->default(0);
            $table->string('category_code')->nullable();
            $table->string('category_name');
            $table->text('category_desc')->nullable();
            $table->integer('category_author')->nullable();
            $table->integer('category_status');
            $table->string('category_url')->nullable();
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
        Schema::dropIfExists('tbl_category_product');
    }
}
