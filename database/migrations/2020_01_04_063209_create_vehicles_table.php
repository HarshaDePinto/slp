<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image_id')->nullable();
            $table->integer('status')->default(0);
            $table->string('name')->nullable();
            $table->string('number')->nullable();
            $table->string('location')->default('In House');
            $table->string('color')->nullable();
            $table->string('seat')->nullable();
            $table->string('owner')->nullable();
            $table->integer('sMilage')->unsigned()->nullable();
            $table->integer('cMilage')->unsigned()->nullable();
            $table->integer('next_service')->unsigned()->nullable();
            $table->timestamp('license_exp')->nullable();
            $table->timestamp('insurance_exp')->nullable();
            $table->string('engine_oil')->nullable();
            $table->integer('gear_oil_change')->unsigned()->nullable();
            $table->string('gear_oil')->nullable();
            $table->string('ac')->nullable();
            $table->string('tyre_pressure')->nullable();
            $table->string('tyre_size')->nullable();
            $table->string('tyre_air')->nullable();
            $table->string('break_pad')->nullable();
            $table->string('break_oil')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('engine_number')->nullable();
            $table->string('chase_number')->nullable();
            $table->string('author')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
