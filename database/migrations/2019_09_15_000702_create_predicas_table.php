<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePredicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predicas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 200);
            $table->string('descripcion', 500);
            $table->string('pastor', 200);
            $table->longText('imagen');
            $table->longText('link');
            $table->string('status', 100);
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
        Schema::dropIfExists('predicas');
    }
}
