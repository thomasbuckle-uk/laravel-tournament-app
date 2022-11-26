<?php

namespace App\Orchid\Layouts\System\Tournament;

use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Layouts\Rows;

class TournamentEditCheckinLayout extends Rows
{
    public function fields(): array
    {
        return [
            CheckBox::make('tournament.check_in_enabled')
                ->sendTrueOrFalse()
                ->value(false)
                ->disabled()
                ->title('Enable Checkin - DEV ONLY IGNORE')
                ->help("Limits Checkin to between start and end times | DEV ONLY IGNORE"),

            CheckBox::make('tournament.check_in_participant_enabled')
                ->sendTrueOrFalse()
                ->title('Enable Registration')
                ->help("Limits Checkin to between start and end times | Add more logic here eventually"),

            DateTimer::make('tournament.check_in_participant_start_time')
                ->title('Scheduled Checkin Start Time')
                ->noCalendar()
                ->format('h:i K'),
            DateTimer::make('tournament.check_in_participant_end_time')
                ->title('Scheduled Checkin Closing Time')->noCalendar()
                ->format('h:i K'),
        ];
    }
}
