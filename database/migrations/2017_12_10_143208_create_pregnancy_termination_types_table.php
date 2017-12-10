<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePregnancyTerminationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregnancy_termination_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->timestamps();
        });
        DB::table('pregnancy_termination_types')->insert(array(
            array('type'=>'active', 'created_at'=> now(), 'updated_at'=>now()),
            array('type'=>'delivered', 'created_at'=> now(), 'updated_at'=>now()),
            array('type'=>'aborted', 'created_at'=> now(), 'updated_at'=>now())
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pregnancy_termination_types');
    }
}
