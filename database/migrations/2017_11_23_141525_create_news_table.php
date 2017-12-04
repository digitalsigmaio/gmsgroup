<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ar_title');
            $table->string('en_title');
            $table->text('ar_body');
            $table->text('en_body');
            $table->string('image');
            $table->integer('parent_company_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('parent_company_id')->references('id')->on('parents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
