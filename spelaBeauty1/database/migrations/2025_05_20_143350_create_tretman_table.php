<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTretmanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tretmans', function (Blueprint $table) {
            $table->id('id_tretman');
            $table->string('t_naziv', 125);
            $table->text('text_tretman')->nullable();
            $table->integer('t_status');
            $table->integer('tt_id');
            $table->string('putanja_slika', 250)->nullable()->default(null);
            $table->integer('cena')->nullable()->default(null);
            $table->string('description', 500);
            $table->string('keywords', 500);
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
        Schema::dropIfExists('tretmans');
    }
}
