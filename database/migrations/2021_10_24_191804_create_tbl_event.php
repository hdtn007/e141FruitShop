<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_event', function (Blueprint $table) {
            // $table->id();
            $table->increments('event_id'); 
            $table->string('event_name');           // tên voucher
            $table->string('event_aplly');          // trạng thái áp dụng ( 1 : ship hoặc 2 : đơn hàng )
            $table->integer('event_discount');          // mức giảm %
            $table->integer('event_status')->default(1); // trạng thái hiển thị
            $table->text('event_decs')->nullable();  // mô tả
            $table->integer('event_sell_price')->default(30);  // giá bán = 30xu
            $table->integer('event_aplly_price_min')->default(0);
            $table->integer('event_aplly_price_max')->default(1000000000);
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
        Schema::dropIfExists('tbl_event');
    }
}
