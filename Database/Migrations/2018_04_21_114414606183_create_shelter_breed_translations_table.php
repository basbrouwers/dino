<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShelterbreedTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shelter__breed_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('breed_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['breed_id', 'locale']);
            $table->foreign('breed_id')->references('id')->on('shelter__breeds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shelter__breed_translations', function (Blueprint $table) {
            $table->dropForeign(['breed_id']);
        });
        Schema::dropIfExists('shelter__breed_translations');
    }
}
