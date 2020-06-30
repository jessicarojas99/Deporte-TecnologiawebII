<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAthletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athletes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->integer('ci');
            $table->string('gender');
            $table->integer('height');
            $table->integer('weight');
            $table->date('birthdate');
            $table->foreignId('sport_id')->constrained('sports')->nullable();
            $table->foreignId('team_id')->constrained('teams')->nullable();
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
        Schema::dropIfExists('athletes');
    }
}
