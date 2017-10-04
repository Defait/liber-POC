<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('author')->nullable();
            $table->boolean('user_is_author')->default(true);
            $table->text('synopsis');
            $table->string('cover_img_location');
            $table->integer('chapters')->unsigned()->nullable();
            $table->integer('series_id')->unsigned()->nullable();
            $table->integer('book_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('information', function ($table)
        {
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });

        Schema::table('information', function ($table)
        {
            $table->foreign('series_id')
                  ->references('id')
                  ->on('series')
                  ->onDelete('cascade');
        });

        Schema::table('information', function ($table)
        {
            $table->foreign('book_id')
                  ->references('id')
                  ->on('books')
                  ->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information');
    }
}
