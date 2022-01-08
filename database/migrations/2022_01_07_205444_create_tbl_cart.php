<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_cart', function (Blueprint $table) {
            // $table->id();
            $table->increments('cart_id');
            $table->integer('cart_customer_id');
            $table->integer('cart_product_id');
            $table->integer('cart_quantily_product')->default(1);
            $table->integer('cart_status_product')->default(1);
            $table->ipAddress('user_ip_address')->nullable();
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
        Schema::dropIfExists('tbl_cart');
    }
}
