<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            // Billing infos
            $table->string('billingFirstname');
            $table->string('billingLastname');
            $table->string('billingEmail');
            $table->string('billingPhone');
            $table->string('billingAddress');
            $table->string('billingAddress2')->nullable();
            $table->string('billingPostalcode');
            $table->string('billingCity');
            // Delivery infos
            $table->string('deliveryFirstname');
            $table->string('deliveryLastname');
            $table->string('deliveryEmail');
            $table->string('deliveryPhone');
            $table->string('deliveryAddress');
            $table->string('deliveryAddress2')->nullable();
            $table->string('deliveryPostalcode');
            $table->string('deliveryCity');
            // Status
            $table->string('status');
            $table->string('paymentType')->nullable();
            $table->string('invoiceNumber')->nullable();
            $table->string('followNumber')->nullable();
            // Price data
            $table->float('shippingCost')->default(0);
            $table->float('price');
            $table->float('taxedPrice');
            $table->float('tax');
            // Dates
            $table->dateTime('paidDate')->nullable();
            $table->dateTime('refusedDate')->nullable();
            $table->timestamps();
            // Relations
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
