<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ar_name');
            $table->string('en_name');
            $table->text('ar_about');
            $table->text('en_about');
            $table->text('ar_vision')->nullable();
            $table->text('en_vision')->nullable();
            $table->text('ar_slogan')->nullable();
            $table->text('en_slogan')->nullable();
            $table->string('ar_address');
            $table->string('en_address');
            $table->string('email');
            $table->string('tel');
            $table->string('gmap');
            $table->string('logo');
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
        Schema::dropIfExists('parents');
    }
}
