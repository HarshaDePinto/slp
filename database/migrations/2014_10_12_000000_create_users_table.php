<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('role_id')->index()->unsigned()->nullable();
            $table->integer('is_active')->default(0);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image_id')->nullable();
            $table->integer('status')->default(0);
            $table->text('tel')->nullable();
            $table->string('nic')->nullable();
            $table->string('dln')->nullable();
            $table->text('bank')->nullable();
            $table->text('address')->nullable();
            $table->text('note')->nullable();
            $table->text('complain')->nullable();
            $table->text('emergency')->nullable();
            $table->string('author')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
