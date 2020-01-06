<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number')->nullable();
            $table->text('passenger_details')->nullable();
            $table->dateTime('start')->nullable();
            $table->text('start_details')->nullable();
            $table->dateTime('end')->nullable();
            $table->text('end_details')->nullable();
            $table->text('hotel_details')->nullable();
            $table->text('plan_details')->nullable();
            $table->text('activity_details')->nullable();
            $table->text('cost_details')->nullable();
            $table->text('payment_method')->nullable();
            $table->text('includes_details')->nullable();
            $table->text('accommodation_details')->nullable();
            $table->text('condition')->nullable();
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
        Schema::dropIfExists('agreements');
    }
}
