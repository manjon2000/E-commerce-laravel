<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->string('image_product');
            $table->integer('category_id');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable();
            $table->string('image_url')->nullable();
            $table->timestamps();
        });
        Schema::create('product_favorites', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('product_id');
            $table->timestamps();
        });
        Schema::create('product_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('locale');
            $table->string('description');
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
        Schema::dropIfExists('products');
        Schema::dropIfExists('products_images');
        Schema::dropIfExists('products_favorites');
        Schema::dropIfExists('product_translations');
    }
}
