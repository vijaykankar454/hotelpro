<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtherfieldToPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->integer('invoice_number')->unsigned()->nullable()->after('v_price');
            $table->string('transaction_id',50)->nullable()->after('invoice_number');
            $table->string('card_number')->nullable()->after('transaction_id');
            $table->string('cvv',5)->nullable()->after('card_number');
            $table->string('exp_month',3)->nullable()->after('cvv');
            $table->date('payment_date')->after('exp_month');
            $table->year('exp_year')->after('exp_month');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn(['invoice_number','payment_date','transaction_id','card_number','cvv','exp_month','exp_year']);
        });
    }
}
