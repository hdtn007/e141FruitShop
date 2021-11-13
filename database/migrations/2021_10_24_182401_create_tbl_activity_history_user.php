<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblActivityHistoryUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_activity_history_user', function (Blueprint $table) {
            // $table->id();
            $table->increments('uac_id');
            $table->integer('uac_user_id');       // user thực hiện
            $table->text('uac_decs');              // mô tả hành động vừa thực hiện
            $table->integer('uac_status_note')->default(0); // trạng thái thông báo
            $table->integer('uac_status_view')->default(1);  // trạng thái đã xem
            $table->integer('uac_icon')->default(1); // icon minh họa
            $table->text('uac_url')->nullable();       // url dẫn đến
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
        Schema::dropIfExists('tbl_activity_history_user');
    }
}
