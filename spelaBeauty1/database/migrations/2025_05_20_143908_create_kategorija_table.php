<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategorijaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategorijas', function (Blueprint $table) {
            $table->id('id_kategorija');
            $table->string('kat_naziv', 250);
            $table->text('text_kat')->nullable()->default(null);
            $table->integer('k_status');
            $table->string('slika_putanja', 500)->nullable()->default(null);
            $table->integer('cena')->nullable()->default(null);
            $table->integer('t_id');
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
        Schema::dropIfExists('kategorijas');
    }
}
