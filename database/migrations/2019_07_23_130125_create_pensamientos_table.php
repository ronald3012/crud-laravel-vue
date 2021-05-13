<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePensamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pensamientos', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('descripcion');

            $table->unsignedInteger('user_id');

            //$table->foreign('user_id')->references('id')->on('users'); 

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
        Schema::dropIfExists('pensamientos');
    }
}
