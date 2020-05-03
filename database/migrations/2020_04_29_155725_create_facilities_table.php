<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('facilities_id');
            $table->boolean('is_refrigerator');
            $table->boolean('is_furniture');
            $table->boolean('is_tv');
            $table->boolean('is_bathroom');
            $table->boolean('is_internet');
            $table->boolean('is_kitchen');
            $table->boolean('is_balcony');
           
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
        Schema::dropIfExists('facilities');
    }
}
