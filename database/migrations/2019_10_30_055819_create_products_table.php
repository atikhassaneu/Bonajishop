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
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->string('title',255);
            $table->integer('price');
            $table->integer('discounted_price')->default(0);
            $table->text('short_description');
            $table->text('description');
            $table->string('thumbnail',255);
            $table->string('slug',255);
            $table->integer('stock');
            $table->integer('view')->default(0);
            $table->text('tag');
            $table->tinyInteger('status');
            $table->tinyInteger('visibility')->default(1);
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
    }
}
