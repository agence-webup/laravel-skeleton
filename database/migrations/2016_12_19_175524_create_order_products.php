<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->string('reference');
            $table->string('name');
            $table->integer('quantity');
            $table->float('price');
            $table->float('taxedPrice');
            $table->float('tax');
            $table->float('taxRate');
            $table->float('totalPrice');
            $table->float('totalTaxedPrice');
            $table->float('totalTax');
            $table->float('weight');
            $table->float('totalWeight');

            // Relations
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
}
