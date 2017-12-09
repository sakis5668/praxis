<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('language');
            $table->string('description');
            $table->timestamps();
        });
        DB::table('languages')->insert(array(
            array('language'=>'en', 'description'=>'english' ,'created_at'=> now(), 'updated_at'=>now()),
            array('language'=>'de', 'description'=>'german','created_at'=> now(), 'updated_at'=>now()),
            array('language'=>'el', 'description'=>'greek','created_at'=> now(), 'updated_at'=>now())
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
