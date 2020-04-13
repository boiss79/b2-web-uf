<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPurchasedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_purchased', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->string('price');
            $table->string('url_sheet');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->timestamps();


            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('buyer_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_purchased');
    }
}
