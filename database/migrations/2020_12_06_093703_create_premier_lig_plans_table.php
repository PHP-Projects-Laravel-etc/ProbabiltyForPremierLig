<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremierLigPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premier_lig_plans', function (Blueprint $table) {
            $table->id();
            $table->integer('home_team_id');
            $table->integer('away_team_id');
            $table->date('match_date');
            $table->boolean('match_completed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('premier_lig_plans');
    }
}
