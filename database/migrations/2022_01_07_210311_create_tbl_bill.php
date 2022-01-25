<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bill', function (Blueprint $table) {
            // $table->id();
            $table->increments('bills_id');
            $table->string('bills_bill_id',25); // Số hóa đơn
            $table->integer('bills_customer_id')->nullable(); // người mua
            $table->integer('bills_product_id');  // sản phẩm mua
            $table->integer('bills_quantity')->default(1); // số lượng mua
            $table->dateTime('bills_purchase_date')->nullable(); // mua vào ngày
            $table->integer('bills_status_product')->default(1); // trạng thái sản phẩm
            $table->integer('bills_status_bill')->default(0); // trạng thái hóa đơn
            $table->text('bills_desc')->nullable(); // mô tả bill
            $table->integer('bills_price_product'); // giá bán sản phẩm
            $table->integer('bills_sum_price')->nullable(); // Tổng tiền bill
            $table->text('bills_customer_request')->nullable(); // yêu cầu của khách hàng
            $table->string('bills_customer_name')->nullable(); // Tên người mua hàng
            $table->text('bills_customer_address')->nullable(); // Địa chỉ người mua hàng
            $table->string('bills_customer_phone')->nullable(); // Sđt người mua hàng
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
        Schema::dropIfExists('tbl_bill');
    }
}
