<?php

namespace App\Orchid\Layouts\System\Tournament;

use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Layouts\Rows;

class TournamentEditRegistrationLayout extends Rows
{
    public function fields(): array
    {
        return [
            CheckBox::make('tournament.registration_enabled')
                ->sendTrueOrFalse()
                ->title('Enable Registration')
                ->help("Limits Registration to between start and end dates | Add more logic here eventually"),

            DateTimer::make('tournament.registration_opening_time')
                ->title('Scheduled Registration Start Date & Time'),

            DateTimer::make('tournament.registration_closing_time')
                ->title('Scheduled Registration Closing Date & Time')
        ];
    }
}
