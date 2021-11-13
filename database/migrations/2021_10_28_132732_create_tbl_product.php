<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            // $table->id(); // hạn sử dụng nhập trong phiếu nhập
            $table->increments('product_id');
            $table->string('product_code')->nullable();         // mã sp
            $table->string('product_qrcode')->nullable();       // mã QR
            $table->string('product_name');
            $table->integer('product_category_id');             // danh mục
            $table->integer('product_country_id');              // xuất xứ
            $table->integer('product_brand_id')->nullable();    // thương hiệu
            $table->integer('product_author_id');               // người thêm sản phẩm
            $table->text('product_desc')->nullable();           // mô tả sp
            $table->integer('product_status')->default(1);      // trạng thái hoạt động
            $table->integer('product_like')->default(0);        // lượt thích sp
            $table->integer('product_import_price')->default(0);// giá nhập
            $table->integer('product_sell_price')->default(0);  // giá bán
            $table->integer('product_sale_status')->default(0); // trạng thái khuyến mãi
            $table->integer('product_sale_price')->default(0);  // giá khuyến mãi
            $table->integer('product_inventory')->default(0);   // Tồn kho
            $table->integer('product_count_product_sold')->default(0); // đã bán
            $table->integer('product_view')->default(0);        // lượt xem
            $table->string('product_url');                      // đường dẫn đến sp
            $table->text('product_keywords')->nullable();       // từ khóa SEO
            $table->integer('product_def_expires')->nullable(); // số ngày hết hạn tiêu chuẩn ( tính bằng ngày )
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
        Schema::dropIfExists('tbl_product');
    }
}
