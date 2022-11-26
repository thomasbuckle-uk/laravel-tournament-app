<?php

namespace App\Models;

use Doctrine\DBAL\Types\DateTimeType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Orchid\Screen\AsMultiSource;

class Tournament extends Model
{
    use HasFactory;
    use AsMultiSource;

    protected $guarded = [];
    /*
     * Model Properties
     * */
    protected string $tournamentName;

    protected string $participantType;

    protected int $size;

    protected string $timezone;

    protected array $platforms;

    protected string $longName;

    protected DateTimeType $scheduledStartDate;

    protected DateTimeType $scheduledEndDate;

    protected bool $isPublic;

    protected bool $online;

    protected string $location;

    protected string $country;

    // Registration
    protected bool $registrationEnabled;
    protected DateTimeType $registrationOpeningTime;
    protected DateTimeType $registrationClosingTime;


    //TODO
//    protected int $organisationId;
    protected string $contactEmail;
    protected string $discordUrl;
    protected string $websiteUrl;


    protected string $description;

    protected string $rules;

    protected array $prizes;

    //TODO
    protected bool $matchReportsEnabled;


    /*
     * Check in
    */
    protected bool $checkInEnabled;
    protected bool $checkInParticipantEnabled;
    protected DateTimeType $checkInParticipantStartTime;
    protected DateTimeType $checkInParticipantEndTime;

    protected bool $isArchived;


    /**
     * Notifies Organiser when a new registration occurs
     * @var bool
     */
    protected bool $registrationNotificationEnabled;

    /**
     * Notifies Participants when they register to a tournament or their registration status changes
     * @var bool
     */
    protected bool $registrationParticipantEmailEnabled;

    protected string $registrationRequestMessage;

    protected string $registrationAcceptanceMessage;

    protected string $registrationRefusalMessage;


    /**
     * Enables custom Terms and Conditions for this tournament
     * @var bool
     */
    protected bool $registrationTermsEnabled;

    /**
     * Link to custom Terms and Conditions for this tournament
     * @var string
     */
    protected string $registrationTermsUrl;

    protected int $minTeamSize;

    protected int $maxTeamSize;


    protected $casts = [
        'scheduled_start_date' => 'datetime',
        'schedule_end_date' => 'datetime',
        'registration_opening_time' => 'datetime',
        'registration_closing_time' => 'datetime',
        'check_in_participant_start_time' => 'datetime:h:i K',
        'check_in_participant_end_time' => 'datetime:h:i K',
    ];

    protected $attributes = [
        'is_public' => true,
        'registration_enabled' => false,
        'match_reports_enabled' => false,
        'check_in_enabled' => false,
        'check_in_participant_enabled' => false,
        'is_archived' => false,
        'registration_notification_enabled' => false,
        'registration_participant_email_enabled' => false,
        'registration_terms_enabled' => false,
        'registration_terms_url' => null,
        'registration_request_message' => 'Thank you for registering for this tournament, if you are accepted you will receive a further email',
        'registration_acceptance_message' => 'You have been accepted for this tournament',
        'registration_refusal_message' => 'You have not been accepted for this tournament'
    ];

    /**
     * Return Game Model for this tournament
     * @return HasOne
     */
    public function game(): HasOne
    {
        return $this->hasOne(Game::class);
    }
}
