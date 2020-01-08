<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocationIdAndActivityIdToDuties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('duties', function (Blueprint $table) {
            $table->integer('location_id')->index()->unsigned()->nullable();
            $table->integer('activity_id')->index()->unsigned()->nullable();
            $table->integer('shop_id')->index()->unsigned()->nullable();
            $table->integer('expense_id')->index()->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('duties', function (Blueprint $table) {
            //
        });
    }
}
