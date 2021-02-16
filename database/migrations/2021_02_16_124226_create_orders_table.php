<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->timestamps();
            $table->softDeletes();
            $table->string('user_id')->nullable();
            $table->string('invoiceno', 10)->nullable();
            $table->mediumText('billing')->nullable();
            $table->mediumText('instructions')->nullable();
            $table->decimal('subtotal', 10, 2)->nullable();
            $table->string('paymentid')->nullable();
            $table->longText('responseinfos')->nullable();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity')->default(1)->nullable();
            $table->decimal('unitprice')->nullable();
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
        Schema::dropIfExists('order_items');
    }
}
