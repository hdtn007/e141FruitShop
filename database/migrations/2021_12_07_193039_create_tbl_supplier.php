<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSupplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_supplier', function (Blueprint $table) {
            // $table->id();
            $table->increments('supplier_id');
            $table->integer('supplier_code');
            $table->string('supplier_name');
            $table->string('supplier_address')->nullable(); 
            $table->string('supplier_phone')->nullable(); 
            $table->string('supplier_email')->nullable();
            $table->string('supplier_desc')->nullable();
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
        Schema::dropIfExists('tbl_supplier');
    }
}
