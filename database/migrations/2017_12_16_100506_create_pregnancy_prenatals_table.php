<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePregnancyPrenatalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregnancy_prenatals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pregnancy_id')->unsigned()->nullable();
            $table->date('date')->nullable();
            $table->string('pregnancy_age')->nullable();
            $table->integer('type')->nullable();
            $table->string('examiner')->nullable();
            $table->text('findings')->nullable();
            $table->timestamps();
        });
        Schema::table('pregnancy_prenatals', function (Blueprint $table) {
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
        Schema::dropIfExists('pregnancy_prenatals');
    }
}
