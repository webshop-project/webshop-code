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
            $table->string('loginToken');
            $table->string('loginName');
            $table->string('password');
            $table->string('role');
            $table->string('country');
            $table->string('postcode');
            $table->string('streetName');
            $table->string('houseNumber');
            $table->string('houseNumberAddOn');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('middleName');
            $table->rememberToken();
            $table->timestamps('created_at');
            $table->timestamps('updated_at');
            $table->timestamps('deleted_at');
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
