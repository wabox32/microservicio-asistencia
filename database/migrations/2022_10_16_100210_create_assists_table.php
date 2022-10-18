<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('assists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lounge_id');
            $table->foreign('lounge_id')->references('id')->on('lounges')->onDelete('cascade');
            $table->unsignedBigInteger('matter_id');
            $table->foreign('matter_id')->references('id')->on('matters')->onDelete('cascade');
            $table->unsignedBigInteger('studient_id');
            $table->foreign('studient_id')->references('id')->on('studients')->onDelete('cascade');
            $table->string('code_user', '45');
            $table->dateTime('admission_date');
            $table->dateTime('departure_date');
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
        Schema::dropIfExists('assists');
    }
}
