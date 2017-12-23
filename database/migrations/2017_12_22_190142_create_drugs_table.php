<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('drug_company_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->text('information')->nullable();
            $table->string('content')->nullable();
            $table->string('dosage')->nullable();
            $table->string('filename')->nullable();
            $table->timestamps();
        });
        Schema::table('drugs', function (Blueprint $table) {
            $table->foreign('drug_company_id')->references('id')->on('drug_companies')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drugs');
    }
}
