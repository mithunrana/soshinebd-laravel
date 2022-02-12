<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHiringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hirings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Name');
            $table->string('Mobile');
            $table->string('Email');
            $table->date('BirthDate');
            $table->integer('City')->nullable();
            $table->string('PortfolioWebsite')->nullable();
            $table->string('CV')->nullable();
            $table->longText('CurrentAddress')->nullable();
            $table->float('SalaryDemand')->nullable();
            $table->string('MartialStatus')->nullable();
            $table->string('ShortListStatus')->nullable();
            $table->string('CircularCode')->nullable();
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
        Schema::dropIfExists('hirings');
    }
}
