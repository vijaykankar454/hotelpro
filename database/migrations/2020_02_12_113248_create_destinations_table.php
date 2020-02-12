<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('v_name',100)->nullable();
            $table->string('v_heading',150)->nullable();
            $table->text('v_short_description')->nullable();
            $table->string('v_pack_heading',150)->nullable();
            $table->string('v_pack_sub_heading',150)->nullable();
            $table->string('v_det_heading',150)->nullable();
            $table->string('v_det_sub_heading',150)->nullable();
            $table->string('v_photo',150)->nullable();
            $table->string('v_banner',150)->nullable();
            $table->longText('v_introduction')->nullable();    
            $table->longText('v_experience')->nullable(); 
            $table->longText('v_weather')->nullable(); 
            $table->longText('v_hotel')->nullable(); 
            $table->longText('v_transportation')->nullable(); 
            $table->longText('v_culture')->nullable(); 
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
        Schema::dropIfExists('destinations');
    }
}
