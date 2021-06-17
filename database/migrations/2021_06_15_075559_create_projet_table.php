<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('description');
            $table->integer('duree');
            $table->date('debut');
            $table->date('fin');

            $table->unsignedBigInteger('filiere_id');
            $table->unsignedBigInteger('user_id');


            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('filiere_id')->references('id')->on('filieres')->onDelete('CASCADE');


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
        Schema::dropIfExists('projets');
    }
}
