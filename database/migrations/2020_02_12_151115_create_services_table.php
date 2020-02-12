<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('v_name',100)->nullable();
            $table->text('v_short_description')->nullable();
            $table->longText('v_desc')->nullable();   
            $table->string('v_icon',70)->nullable(); 
            $table->string('v_photo',250)->nullable();
            $table->string('v_banner',250)->nullable();
            $table->text('v_metatitile')->nullable();
            $table->text('v_metakeyword')->nullable();
            $table->text('v_metadescription')->nullable();
            $table->integer('i_status')->nullable()->default(1);
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
        Schema::dropIfExists('services');
    }
}
