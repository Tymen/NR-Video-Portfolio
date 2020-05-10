<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCollumnTitleToPagesMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages_media', function (Blueprint $table) {
            $table->string("title")->nullable()->after("pages_id");
            $table->string("subtitle")->nullable()->after("title");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages_media', function (Blueprint $table) {
            //
        });
    }
}
