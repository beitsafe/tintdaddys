<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShapeSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizes_shades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('size');
            $table->string('shade');
            $table->integer('quantity')->nullable()->default(1);
            $table->decimal('price')->nullable()->default(0);
        });
        Schema::create('product_variants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('shade_size_id');
        });

        \App\Models\OrderItem::query()->whereRaw("1=1")->forceDelete();
        \App\Models\Order::query()->whereRaw("1=1")->forceDelete();

        Schema::table('order_items', function (Blueprint $table) {
            $table->renameColumn('product_id','product_variant_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sizes_shades');
        Schema::dropIfExists('product_variants');

        Schema::table('order_items', function (Blueprint $table) {
            $table->renameColumn('product_variant_id','product_id');
        });
    }
}
