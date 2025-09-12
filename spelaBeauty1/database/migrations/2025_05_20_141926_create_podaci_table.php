<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodaciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podacis', function (Blueprint $table) {

            $table->id();
            $table->text('text');
            $table->string('ulica', 125)->nullable();
            $table->string('mesto', 125)->nullable();
            $table->string('kontakt_tel', 125)->nullable();
            $table->string('podaci_slika_pocetna', 250)->nullable();
            $table->string('profilna_slika', 500)->nullable();
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
        Schema::dropIfExists('podacis');
    }
}
