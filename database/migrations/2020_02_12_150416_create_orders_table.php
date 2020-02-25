<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 64);
            $table->string('email', 128)->nullable();
            $table->string('phone', 15);
            $table->text('address');
            $table->integer('post_code');
            $table->string('city', 64);
            $table->string('payment_method', 32);
            $table->string('bkash_verification_code',64)->nullable();
            $table->string('delivery_charge',10);
            $table->string('total_price',11);
            $table->enum('order_status', ['pending', 'process', 'delivery', 'completed'])->default('pending');
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
        Schema::dropIfExists('orders');
    }
}
