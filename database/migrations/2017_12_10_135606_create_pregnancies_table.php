<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePregnanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregnancies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned()->nullable();
            $table->integer('pregnancy_termination_type')->nullable();
            $table->date('lmp')->nullable();
            $table->date('edd')->nullable();
            $table->date('corrected_edd')->nullable();
            $table->boolean('finished')->nullable()->default(0);
            $table->timestamps();
        });
        Schema::table('pregnancies', function (Blueprint $table) {
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
        Schema::dropIfExists('pregnancies');
    }
}
