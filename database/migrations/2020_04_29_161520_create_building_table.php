<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building', function (Blueprint $table) {
            $table->bigIncrements('building_id');
            $table->text('description');
            $table->integer('price');
        
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('address_id')->on('address')->onDelete('cascade');

            $table->unsignedBigInteger('facilities_id');
            $table->foreign('facilities_id')->references('facilities_id')->on('facilities')->onDelete('cascade');

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
        Schema::dropIfExists('building');
    }
}
