<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseTypeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_type_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('house_type_id');
            $table->unsignedBigInteger('contractor_id');
            $table->integer('harga');
            $table->foreign('house_type_id')->references('id')->on('house_types');
            $table->foreign('contractor_id')->references('id')->on('contractors');
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
        Schema::dropIfExists('house_type_details');
    }
}
