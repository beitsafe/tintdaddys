<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToWarrantiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('warranties', function (Blueprint $table) {
            $table->text('installerCompanyName');
            $table->string('installerCompanyPhone')->nullable();
            $table->text('installerCompanyPerson');
            $table->string('installerCompanyEmail')->nullable();
            $table->text('installerCompanyAddress');
            $table->string('installerCompanyCity');
            $table->string('installerCompanyState');
            $table->string('installerCompanyPostcode')->nullable();

            $table->text('customerName');
            $table->text('customerAddress');
            $table->string('customerCity');
            $table->string('customerState');
            $table->string('customerPostcode')->nullable();
            $table->string('customerPhone')->nullable();
            $table->text('customerEmail')->nullable();

            $table->dateTime('vehicleInstallationDate');
            $table->string('vehicleRegistration');
            $table->string('vehicleYear');
            $table->string('vehicleMake');
            $table->string('vehicleModel');
            $table->string('vehicleVin')->nullable();

            $table->text('windscreenFilmName')->nullable();
            $table->string('windscreenVlt')->nullable();
            $table->string('windscreenRollNumber')->nullable();

            $table->text('frontSideFilmName')->nullable();
            $table->string('frontSideVlt')->nullable();
            $table->string('frontSideRollNumber')->nullable();

            $table->text('rearSideFilmName')->nullable();
            $table->string('rearSideVlt')->nullable();
            $table->string('rearSideRollNumber')->nullable();

            $table->text('rearWindscreenFilmName')->nullable();
            $table->string('rearWindscreenSideVlt')->nullable();
            $table->string('rearWindscreenSideRollNumber')->nullable();

            $table->text('additionalFilmName')->nullable();
            $table->string('additionalVlt')->nullable();
            $table->string('additionalRollNumber')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('warranties', function (Blueprint $table) {
            //
        });
    }
}
