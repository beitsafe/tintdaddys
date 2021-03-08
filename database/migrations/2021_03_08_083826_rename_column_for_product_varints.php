<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnForProductVarints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['avail_sizeshades']);
        });

        Schema::table('product_variants', function (Blueprint $table) {
            $table->renameColumn('shade_size_id', 'size_shade_id');
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
            $table->longText('avail_sizeshades')->nullable()->after('weight');
        });

        Schema::table('product_variants', function (Blueprint $table) {
            $table->renameColumn('size_shade_id', 'shade_size_id');
        });
    }
}
