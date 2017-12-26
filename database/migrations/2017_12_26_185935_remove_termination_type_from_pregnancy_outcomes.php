<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveTerminationTypeFromPregnancyOutcomes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pregnancy_outcomes', function (Blueprint $table) {
            $table->dropColumn('termination_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pregnancy_outcomes', function (Blueprint $table) {
            $table->integer('termination_type')->nullable();
        });
    }
}
