<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('position_int');
            $table->string('name');
            $table->char('num_id')->length(16);
            $table->string('placeofbirth');
            $table->date('birthdate');
            $table->string('gender')->length(1);
            $table->string('religion')->length(30);
            $table->string('blood_class')->length(1);
            $table->string('status')->length(10);
            $table->longText('address_id');
            $table->longText('address');
            $table->string('email');
            $table->char('num_hp')->length(12);
            $table->char('num_hp_fr')->length(12);
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
        Schema::dropIfExists('registers');
    }
}
