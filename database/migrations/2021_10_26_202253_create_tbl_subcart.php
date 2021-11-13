<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSubcart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_subcart', function (Blueprint $table) {
            // $table->id();
            $table->increments('subcart_id'); 
            $table->integer('subcart_user_id');  // tên user mua
            $table->integer('subcart_event_id'); // voucher đã mua
            $table->integer('subcart_count');    // số lượng mua
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
        Schema::dropIfExists('tbl_subcart');
    }
}
