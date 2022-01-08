<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCategoryPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_category_posts', function (Blueprint $table) {
            // $table->id();
            $table->increments('cate_post_id');
            $table->integer('cate_post_sub')->default();
            $table->string('cate_post_name');
            $table->text('cate_post_desc')->nullable();
            $table->integer('cate_post_author');
            $table->integer('cate_post_status');
            $table->string('cate_post_url')->nullable();
            $table->string('cate_post_other')->nullable();
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
        Schema::dropIfExists('tbl_category_posts');
    }
}
