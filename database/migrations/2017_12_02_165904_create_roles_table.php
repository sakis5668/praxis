<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('roles')->insert(array(
            array('name'=>'admin', 'created_at'=> now(), 'updated_at'=>now()),
            array('name'=>'user', 'created_at'=> now(), 'updated_at'=>now()),
            array('name'=>'secretary', 'created_at'=> now(), 'updated_at'=>now()),
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
