<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('country')->nullable();
            $table->string('gamer_tag')->nullable();
            $table->string('discord_username')->nullable();
            $table->string('twitter_username')->nullable();
            $table->string('twitch_username')->nullable();
            $table->integer('age')->nullable();
            $table->text('about_me')->nullable();
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
        Schema::dropIfExists('user_profile');

    }
};
