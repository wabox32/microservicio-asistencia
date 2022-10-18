<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoungesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lounges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campu_id');
            $table->foreign('campu_id')->references('id')->on('campus')->onDelete('cascade');
            $table->string('lounge', 45);
            $table->string('description', 191);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lounges');
    }
}
