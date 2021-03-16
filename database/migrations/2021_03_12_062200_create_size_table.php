<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->text('name');
        });

        Schema::create('shades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->text('name');
        });

        Schema::dropIfExists('sizes_shades');

        Schema::table('product_variants', function (Blueprint $table) {
            $table->renameColumn('size_shade_id', 'size_id');
            $table->unsignedBigInteger('shade_id');
            $table->decimal('price', 10, 2)->nullable()->default(0);
            $table->dropColumn('id');
            $table->dropTimestamps();
            $table->dropSoftDeletes();
        });

        \App\Models\Order::query()->whereRaw(1, 1)->forceDelete();
        \App\Models\OrderItem::query()->whereRaw(1, 1)->forceDelete();

        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn('product_variant_id');
            $table->string('size')->nullable();
            $table->string('shade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sizes');
        Schema::dropIfExists('shades');

        Schema::create('sizes_shades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('size');
            $table->string('shade');
            $table->integer('quantity')->nullable()->default(1);
            $table->decimal('price')->nullable()->default(0);
        });

        Schema::table('product_variants', function (Blueprint $table) {
            $table->renameColumn('size_id', 'size_shade_id');
            $table->dropColumn(['shade_id', 'price']);
            $table->id();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn(['size', 'shade']);
            $table->unsignedBigInteger('product_variant_id')->nullable();
        });
    }
}
