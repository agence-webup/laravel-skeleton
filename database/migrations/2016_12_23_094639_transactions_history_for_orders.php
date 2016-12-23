<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransactionsHistoryForOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->json('transactionsHistory')->nullable()->after('tax');

            $table->dropColumn('paidDate');
            $table->dropColumn('refusedDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('transactionsHistory');
            $table->dateTime('paidDate')->nullable()->after('tax');
            $table->dateTime('refusedDate')->nullable()->after('paidDate');
        });
    }
}
