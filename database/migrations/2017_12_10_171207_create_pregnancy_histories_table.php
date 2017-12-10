<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePregnancyHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregnancy_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pregnancy_id')->unsigned()->nullable();
            $table->text('history')->nullable();
            $table->timestamps();
        });
        Schema::table('pregnancy_histories', function (Blueprint $table) {
            $table->foreign('pregnancy_id')->references('id')->on('pregnancies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pregnancy_histories');
    }
}
