<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_posts', function (Blueprint $table) {
            // $table->id();
            $table->increments('post_id');
            $table->integer('post_category_posts_id');
            $table->string('post_title');
            $table->string('post_title_image');
            $table->longText('post_desc');
            $table->text('post_shost_desc')->nullable();
            $table->integer('post_author');
            $table->integer('post_status')->default(0);
            $table->string('post_url')->nullable();
            $table->integer('post_like')->default(0);
            $table->integer('post_view')->default(0);
            $table->integer('post_share')->default(0);
            $table->integer('post_count_comment')->default(0);
            $table->integer('post_hot_status')->default(0);
            $table->integer('post_topic_tag')->nullable();
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
        Schema::dropIfExists('tbl_posts');
    }
}
