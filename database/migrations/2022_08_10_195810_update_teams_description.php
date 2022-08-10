<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->text('description')
                ->after('name')
                ->nullable();
            $table->string('profile_photo_path', 2048)
                ->after('description')
                ->nullable();
            $table->string('twitter_username')->nullable();
            $table->string('twitch_username')->nullable();
            $table->string('website_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('team', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('profile_photo_path');
            $table->dropColumn('twitter_username');
            $table->dropColumn('twitch_username');
            $table->dropColumn('website_url');
        });
    }
};
