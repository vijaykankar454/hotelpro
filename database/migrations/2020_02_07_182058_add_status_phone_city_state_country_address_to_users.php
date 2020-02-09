<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusPhoneCityStateCountryAddressToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone',50)->after('email')->nullable();
            $table->string('city',100)->after('phone')->nullable();
            $table->string('state',100)->after('city')->nullable();
            $table->string('country',100)->after('state')->nullable();
            $table->string('address',500)->after('country')->nullable();
             $table->integer('status')->after('address')->nullable()->default(1);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone','city','state','country','address','status');
        });
    }
}
