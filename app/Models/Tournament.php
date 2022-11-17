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

    /**
     * Return Game Model for this tournament
     * @return HasOne
     */
    public function game(): HasOne
    {
        return $this->hasOne(Game::class);
    }
}
