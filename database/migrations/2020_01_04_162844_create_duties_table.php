<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDutiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('vehicle_id')->index()->unsigned()->nullable();
            $table->integer('user_id')->index()->unsigned()->nullable();
            $table->string('title');
            $table->string('number')->nullable();
            $table->integer('type');
            $table->integer('dollar')->nullable();
            $table->integer('status')->default(0);
            $table->integer('price')->default(0);
            $table->integer('advanced')->default(0);
            $table->integer('agreement_id')->index()->unsigned()->nullable();
            $table->integer('finance_id')->index()->unsigned()->nullable();
            $table->string('client')->nullable();
            $table->string('client_email')->nullable();
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
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
        Schema::dropIfExists('duties');
    }
}
