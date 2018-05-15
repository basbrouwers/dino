<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShelterAnimalTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shelter__animal_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('animal_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['animal_id', 'locale']);
            $table->foreign('animal_id')->references('id')->on('shelter__animals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shelter__animal_translations', function (Blueprint $table) {
            $table->dropForeign(['animal_id']);
        });
        Schema::dropIfExists('shelter__animal_translations');
    }
}
