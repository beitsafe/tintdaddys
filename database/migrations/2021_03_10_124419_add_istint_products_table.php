<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIstintProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('istint')->nullable()->default(0);
        });

        \App\Models\Order::query()->whereRaw(1,1)->forceDelete();
        \App\Models\OrderItem::query()->whereRaw(1,1)->forceDelete();

        Schema::table('order_items', function (Blueprint $table) {
            $table->unsignedBigInteger('product_variant_id')->nullable()->change();
            $table->unsignedBigInteger('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('istint');
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn(['product_id']);
        });

    }
}
