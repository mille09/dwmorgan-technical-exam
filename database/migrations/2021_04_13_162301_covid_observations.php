<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CovidObservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covid_observations', function (Blueprint $table) {
            $table->id('sno');
            $table->date('observation_date');
            $table->string('state');
            $table->string('country');
            $table->timestamp('last_updated');
            $table->integer('confirmed');
            $table->integer('deaths');
            $table->integer('recovered');
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
        Schema::dropIfExists('covid_observations');
    }
}
