<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShelterAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shelter__animals', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('name');
            $table->integer('breed_id');
            $table->enum('gender',['male','female']);
            $table->date('dob');
            $table->boolean('with_other_dog');
            $table->boolean('with_other_cat');
            $table->boolean('children_below_age_7');
            $table->boolean('children_above_age_7');
            $table->boolean('fixed');
            $table->boolean('aggression');
            $table->boolean('aggession_info');
            $table->boolean('chipped');
            $table->boolean('owner_has_passport');
            $table->text('additional_info');
            $table->char('photo',255);
            $table->integer('owner_id');
            $table->timestamps();
        });

        Schema::create('shelter__owners', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('firstname',64);
            $table->char('lastname',64);
            $table->char('street', 64);
            $table->char('housenumber', 16);
            $table->char('zipcode',8);
            $table->char('place',64);
            $table->char('phonenumber',64);
            $table->char('email',64);
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
        Schema::dropIfExists('shelter__animals');
        Schema::dropIfExists('shelter__owners');
    }
}
