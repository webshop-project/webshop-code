<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;
class CreateProductsTable extends Migration
{
    use SoftDeletes;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('house_id');
            $table->integer('category_id');
            $table->integer('size_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('b_model_id')->nullable();
            $table->integer('storage_id')->nullable();
            $table->integer('discount')->nullable();
            $table->string('name');
            $table->decimal('price');
            $table->text('description');
            $table->integer('supply');
            $table->integer('viewAmount');
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
        Schema::dropIfExists('products');
    }
}
