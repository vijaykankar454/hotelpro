<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('parent_id')->unsigned();
			$table->string('v_name')->nullable();
			$table->string('v_title')->nullable();
			$table->longText('v_desc')->nullable();
			$table->text('v_metatitle')->nullable();
			$table->text('v_metadescription')->nullable();
            $table->text('v_metakeyword')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
