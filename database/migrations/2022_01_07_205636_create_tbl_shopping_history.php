<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblShoppingHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_shopping_history', function (Blueprint $table) {
            // $table->id();
            $table->increments('his_shopping_id');
            $table->integer('his_shopping_bill_id')->nullable(); // số hóa đơn
            $table->integer('his_shopping_customer_id'); // người mua
            $table->integer('his_shopping_product_id');  // sản phẩm mua
            $table->integer('his_shopping_quantily')->default(1); // số lượng mua
            $table->date('his_shopping_purchase_date')->nullable(); // mua vào ngày
            $table->integer('his_shopping_status_bill')->default(0); // trạng thái nhận sản phẩm
            $table->integer('his_shopping_price_product'); // giá sản phẩm
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
        Schema::dropIfExists('tbl_shopping_history');
    }
}
