<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data__materis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('materi_id')->unsigned();               
            $table->text('konten');
            $table->string('photo');
            $table->timestamps();

            $table->foreign('materi_id')->references('id')->on('materis')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data__materis');
    }
}
