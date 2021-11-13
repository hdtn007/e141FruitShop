<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblActivityHistoryAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_activity_history_admin', function (Blueprint $table) {
            // $table->id();
            $table->increments('adac_id');
            $table->integer('adac_admin_id');       // admin thực hiện
            $table->text('adac_decs');              // mô tả hành động vừa thực hiện
            $table->integer('adac_status_note')->default(0); // trạng thái thông báo
            $table->integer('adac_status_view')->default(1);  // trạng thái đã xem
            $table->integer('adac_icon')->default(1); // icon minh họa
            $table->text('adac_url')->nullable();       // url dẫn đến
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
        Schema::dropIfExists('tbl_activity_history_admin');
    }
}
