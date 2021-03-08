<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDispatchedForOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->boolean('dispatched')->nullable()->default(0)->change();
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->text('email')->nullable()->after('lastName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->boolean('dispatched')->nullable()->change();
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('email');
        });
    }
}
