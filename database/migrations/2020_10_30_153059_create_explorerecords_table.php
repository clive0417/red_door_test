<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExplorerecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('explorerecords', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('post_id');
            $table->text('ip');
            $table->text('UA');
            $table->json('header');
            $table->foreign('post_id')->references('id')->on('posts')->ondelete('cascade');

        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('explorerecords', function(Blueprint $table)
        {
            $table->dropForeign(['post_id']);
        });
        Schema::dropIfExists('explorerecords');
    }
}
