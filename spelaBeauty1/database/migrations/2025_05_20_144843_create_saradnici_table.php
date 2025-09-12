<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaradniciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saradnicis', function (Blueprint $table) {
            $table->id('id_saradnici');
            $table->string('ime_saradnika',250);
            $table->integer('postavljeno');
            $table->string('putanja_slika', 500);
            $table->integer('status_slika');
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
        Schema::dropIfExists('saradnicis');
    }
}
