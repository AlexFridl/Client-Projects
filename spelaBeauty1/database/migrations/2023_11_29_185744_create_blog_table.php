<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id('id_blog');
            $table->string('naslov_blog', 250);
            $table->text('text_blog');
            $table->string('podnaslov_blog', 250)->nullable();
            $table->integer('status');
            $table->string('putanja_slika_blog', 250);
            $table->text('video_link')->nullable()->default(null);
            $table->integer('postavljeno');
            $table->string('description', 500)->nullable();
            $table->string('keywords', 500)->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
