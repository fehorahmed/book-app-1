<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->string('stripe_customer_id')->after('payment_type')->nullable();
            $table->string('latest_charge')->after('stripe_customer_id')->nullable();
            $table->string('payment_method')->after('latest_charge')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropColumn('stripe_customer_id');
            $table->dropColumn('latest_charge');
            $table->dropColumn('payment_method');
        });
    }
}
