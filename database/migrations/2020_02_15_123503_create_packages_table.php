<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('v_name',300)->nullable();
            $table->integer('destination_id')->unsigned()->index()->nullable();
            $table->longText('v_desc')->nullable();
            $table->text('v_location')->nullable();
            $table->date('tour_start_date');
            $table->date('tour_end_date');
            $table->date('last_book_date');
            $table->text('v_map')->nullable();
            $table->longText('v_itinerary')->nullable();
            $table->string('v_price',100)->nullable();
            $table->longText('v_policy')->nullable();
            $table->longText('v_terms')->nullable();
            $table->enum('is_featured', array('No', 'Yes'));
            $table->string('v_photo',200)->nullable();
            $table->string('v_banner',200)->nullable();
            $table->text('v_metatitile')->nullable();
            $table->text('v_metakeyword')->nullable();
            $table->text('v_metadescription')->nullable();
            $table->integer('i_status')->nullable()->default(1);
            $table->timestamps();
        });
        Schema::create('package_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('package_id')->unsigned()->index()->nullable();
            $table->string('v_photo_video',600)->nullable();
            $table->enum('package_type', array('photo', 'video'));
            $table->string('v_tour_photo',200)->nullable();
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
        });
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_data');
        Schema::dropIfExists('packages');
        
    }
}
