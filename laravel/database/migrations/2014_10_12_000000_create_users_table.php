<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;
class CreateUsersTable extends Migration
{
    use SoftDeletes;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amountOflogin');
            $table->string('loginToken');
            $table->string('loginName');
            $table->string('password');
            $table->string('role');
            $table->string('country');
            $table->string('postcode');
            $table->string('streetName');
            $table->string('houseNumber');
            $table->string('houseNumberAddOn')->nullable();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('middleName')->nullable();
            $table->rememberToken();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
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
