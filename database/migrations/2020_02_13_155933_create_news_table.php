<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('v_title',300)->nullable();
            $table->integer('category_id')->unsigned()->index()->nullable();
            $table->text('v_short_content')->nullable();
            $table->longText('v_desc')->nullable();
            $table->date('publish_date');
            $table->enum('e_comment', array('on', 'off'));
            $table->string('v_photo',200)->nullable();
            $table->string('v_banner',200)->nullable();
            $table->text('v_metatitile')->nullable();
            $table->text('v_metakeyword')->nullable();
            $table->text('v_metadescription')->nullable();
            $table->integer('i_status')->nullable()->default(1);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('category_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
