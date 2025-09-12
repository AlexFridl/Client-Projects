<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlajderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slajders', function (Blueprint $table) {
            $table->id('id_slajder');
            $table->string('naslov_slajder', 250);
            $table->string('putanja_slajder', 500);
            $table->integer('postavljeno');
            $table->integer('sort')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('slajders');
    }
}
