<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('payment_date');
            $table->integer('package_id')->unsigned()->index()->nullable();
            $table->string('v_price',100)->nullable();
            $table->integer('total_person')->unsigned()->nullable();
            $table->string('payment_method',50)->nullable();
            $table->string('payment_status',50)->nullable();
            $table->text('tran_info')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
