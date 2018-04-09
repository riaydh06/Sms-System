<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campains', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('campainName');
            $table->string('Startdate');
            $table->string('endingdate');
            $table->string('sendingoption');
            $table->string('continue')->nullable();
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
        Schema::dropIfExists('campains');
    }
}
