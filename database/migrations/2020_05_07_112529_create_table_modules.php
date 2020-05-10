<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableModules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages_media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("mediaIndex");
            $table->integer('pages_id')->unsigned();
            $table->foreign('pages_id')->references('id')->on('pages');
            $table->boolean('image')->default(false);
            $table->longText('body')->nullable();
            $table->string('link')->nullable();
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
        Schema::dropIfExists('modules');
    }
}
