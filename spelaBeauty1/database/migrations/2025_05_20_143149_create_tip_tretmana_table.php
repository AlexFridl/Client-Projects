<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipTretmanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tip_tretmanas', function (Blueprint $table) {
            $table->id('id_tt');
            $table->string('tt_naziv', 125);
            $table->integer('tt_status');
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
        Schema::dropIfExists('tip_tretmanas');
    }
}
