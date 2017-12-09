<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurgeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surgeries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned()->nullable();
            $table->date('date')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('therapy')->nullable();
            $table->string('surgeon')->nullable();
            $table->string('assistant')->nullable();
            $table->string('anesthesia')->nullable();
            $table->string('anesthesist')->nullable();
            $table->text('text')->nullable();
            $table->timestamps();
        });
        Schema::table('surgeries', function (Blueprint $table) {
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surgeries');
    }
}
