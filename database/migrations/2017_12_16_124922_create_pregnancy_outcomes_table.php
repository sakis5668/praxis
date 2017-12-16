<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePregnancyOutcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregnancy_outcomes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pregnancy_id')->unsigned()->nullable();
            $table->date('date')->nullable();
            $table->integer('termination_type')->nullable();
            $table->integer('gender')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('delivery_type')->nullable();
            $table->string('indication')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
        });
        Schema::table('pregnancy_outcomes', function (Blueprint $table) {
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
        Schema::dropIfExists('pregnancy_outcomes');
    }
}
