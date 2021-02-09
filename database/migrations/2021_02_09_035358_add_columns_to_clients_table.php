<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->text('firstName')->nullable();
            $table->text('lastName')->nullable();
            $table->text('businessName')->nullable();
            $table->string('abn')->nullable();
            $table->string('email', 255)->nullable();
            $table->string('phone', 15)->nullable();
            $table->text('address')->nullable();
            $table->text('city')->nullable();
            $table->text('state')->nullable();
            $table->text('postcode')->nullable();
            $table->string('user_id')->nullable();
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
            //
        });
    }
}
