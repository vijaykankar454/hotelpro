<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('v_cat_name',100)->nullable();
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
        Schema::dropIfExists('category_lists');
    }
}
