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
            $table->id('product_id');
            $table->string('product_name');
            $table->text('product_desc');
            $table->text('product_content')->nullable();
            $table->string('product_price');
            $table->string('product_image')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('category_id')->on('tbl_category_product');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('brand_id')->on('tbl_brand');
            $table->integer('product_status')->default(STATUS['ACTIVE']);
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
