<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->text('images');
            $table->boolean('featured')->default(0);
            $table->boolean('live')->default(0);
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->integer('cat_id')->unsigned();
            $table->integer('sub_id')->unsigned();
            $table->text('details')->nullable();
            $table->longText('description');
            $table->float('price');
            $table->float('discount');
            $table->string('sku')->nullable();
            $table->string('weight');
            $table->string('length');
            $table->string('width');
            $table->string('height');
            $table->string('purpose');
            $table->string('stock');
            $table->timestamps();
        });
    
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('cat_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->foreign('sub_id')->references('id')->on('subcategories')->onDelete('cascade');
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
