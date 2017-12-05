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
            $table->integer('category_id');
            $table->integer('img_id');
            $table->integer('size_id');
            $table->integer('brand_id');
            $table->integer('b_model_id');
            $table->integer('house_id');
            $table->integer('storage_id');
            $table->string('name');
            $table->decimal('price');
            $table->text('description');
            $table->integer('supply');
            $table->integer('viewAmount');
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
        Schema::dropIfExists('products');
    }
}
