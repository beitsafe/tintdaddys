<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterClientsStateColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->renameColumn('state', 'suburb');
            $table->string('country')->nullable()->default('AU')->after('postcode');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->decimal('shippingfee')->nullable()->default(0)->after('subtotal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->renameColumn('suburb', 'state');
//            $table->dropColumn('country');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('shippingfee');
        });
    }
}
