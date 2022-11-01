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
    public function up(): void
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('tournament_name');
            $table->string('participant_type');
            $table->integer('size');
            $table->string('timezone');

            //TODO move out into platforms tables eventually
            $table->json('platforms');

            $table->string('long_name');

            $table->dateTime('scheduled_start_date');
            $table->dateTime('scheduled_end_date');
            $table->boolean('is_public');

//            // TODO for future development, IE when we want to run a LAN
//            $table->boolean('is_online');
//            $table->string('location');
//            $table->string('country');


            /*
             * Registration section
             * TODO - Eventually move out into own table and model
             * */

            $table->boolean('registration_enabled');
            $table->dateTime('registration_opening_time');
            $table->dateTime('registration_closing_time');

            // Enables a point of contact for tournament on main page
            $table->string('contact_email')->nullable();
            $table->string('discord_url')->nullable();
            $table->string('website_url')->nullable();


            $table->text('description');
            $table->text('rules');
            $table->json('prizes');


            /*
             * TODO - Feature Match Reporting
             * */
            $table->boolean('match_reports_enabled')->default(false);


            /*
             * Check in
             * */
            $table->boolean('check_in_enabled');
            $table->boolean('check_in_participant_enabled');
            $table->dateTime('check_in_participant_start_time');
            $table->dateTime('check_in_participant_end_time');

            /*
             * TODO - Archives Tournament
             * */
            $table->boolean('is_archived')->default(false);


            /*
             * Enable Notifications to Organiser when a new registration occurs
             * */
            $table->boolean('registration_notification_enabled')->default(false);

            /*
             * Notifies Participants via email when they register to a tournament or their registration status changes
             * */
            $table->boolean('registration_participant_email_enabled');

            $table->string('registration_request_message');
            $table->string('registration_acceptance_message');
            $table->string('registration_refusal_message');

            /*
            * Enables custom Terms and Conditions for this tournament
             * */
            $table->boolean('registration_terms_enabled')->default(false);

            $table->string('registration_terms_url')->nullable();

            $table->integer('min_team_size')->default(1);
            $table->integer('max_team_size')->default(1);


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
        Schema::dropIfExists('tournaments');
    }
};
