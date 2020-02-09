<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('v_name',100)->nullable();
            $table->string('v_email',100)->nullable();
            $table->string('v_designation',80)->nullable();
            $table->string('v_photo',200)->nullable();
            $table->string('v_banner',200)->nullable();
            $table->longText('v_description')->nullable();
            $table->string('v_facebooklink',500)->nullable();
            $table->string('v_twitterlink',500)->nullable();
            $table->string('v_googlepluslink',500)->nullable();
            $table->string('v_instagramlink',500)->nullable();
            $table->string('v_flickr',500)->nullable();
            $table->string('v_phone',50)->nullable();
            $table->string('v_website',250)->nullable();
            $table->text('v_metatitile')->nullable();
            $table->text('v_metakeyword')->nullable();
            $table->text('v_metadescription')->nullable();
            $table->integer('i_status')->nullable()->default(1);
            $table->integer('i_order')->nullable()->default(0);
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
        Schema::dropIfExists('teams');
    }
}
