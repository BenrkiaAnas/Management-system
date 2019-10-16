<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('body');
            $table->string('url',255)->nullable(); // The prouve Of What User Did
            $table->bigInteger('user_id')->unsigned(); //User Created Id
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('commentable_id')->unsigned(); // If User Comment Project It Will Get Project Id , if Comment Companies It Will Get Companies Id ........
            $table->string('commentable_type'); // If User Comment Project It Will Get Project Model , if Comment Companies It Will Get Companies Model ........
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
        Schema::dropIfExists('comments');
    }
}
