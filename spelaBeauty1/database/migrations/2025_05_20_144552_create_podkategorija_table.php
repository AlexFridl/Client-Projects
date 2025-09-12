<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodkategorijaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podkategorijas', function (Blueprint $table) {
            $table->id('id_podkategorija');
            $table->string('podkat_naziv', 250);
            $table->text('tekst_podkat')->nullable()->default(null);
            $table->string('slika_putanja', 500)->nullable()->default(null);
            $table->integer('cena')->nullable()->default(null);
            $table->integer('kategorija_id');
            $table->integer('podkat_status');
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
        Schema::dropIfExists('podkategorijas');
    }
}
