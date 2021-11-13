<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user', function (Blueprint $table) {
            // $table->id();
            $table->increments('user_id');
            $table->string('user_name');
            $table->string('user_username');
            $table->string('user_email')->nullable();
            $table->string('user_phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('user_password');
            $table->integer('user_gender')->default(1); // mặc định Nam
            $table->date('user_birthday')->nullable();
            $table->string('user_avatar')->default('avt_none.png');
            $table->string('user_cover_img')->default('cover_image_none.png ');
            $table->string('user_address')->nullable();
            $table->ipAddress('user_ip_address')->nullable();
            $table->integer('user_status')->default(1); // mặc định là hoạt động
            $table->integer('user_coins')->default(0); // xu tích lũy 100.000đ = 3xu
            $table->integer('user_count_buycoins')->default(0); // số lần mua bằng xu
            $table->rememberToken();
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
        Schema::dropIfExists('tbl_user');
    }
}
