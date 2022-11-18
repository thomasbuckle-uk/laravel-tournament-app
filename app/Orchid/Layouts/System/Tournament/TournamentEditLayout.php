<?php

namespace App\Orchid\Layouts\System\Tournament;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;

class TournamentEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('tournament.tournament_name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Tournament Name'))
                ->placeholder(__('Tournament Name')),


            Input::make('tournament.long_name')
                ->type('text')
                ->title(__('The complete name of the tournament.'))
                ->placeholder('Description...'),

            Select::make('tournament.participant_type')
                ->options([
                    'solo' => 'Individual',
                    'team' => 'Team',
                ])
                ->required()
                ->title(__('Participant type (Solo or Team)'))
                ->help('Description...'),

            Input::make('tournament.size')
                ->type('number')
                ->required()
                ->title(__('Max Number or Teams or Particpents allowed.'))
                ->placeholder('Description...'),

            Input::make('tournament.timezone')
                ->type('text')
                ->required()
                ->title(__('3 Letter Timezone (EG EST)'))
                ->placeholder('Description...'),


            Select::make('tournament.platforms')
                ->options([
                    'PC' => 'PC',
                    'Xbox' => 'Xbox',
                    'PS5' => 'PS5'
                ])
                ->multiple()
                ->title(__('Available Platforms EG PC, Console'))
                ->placeholder('Select from Dropdown!'),

            TextArea::make('tournament.description')
                ->type('text')
                ->title(__('Long text descrption of tournament'))
                ->placeholder('Description...'),

            TextArea::make('tournament.rules')
                ->type('text')
                ->title(__('Long text for rules of tournament'))
                ->placeholder('Description...'),

            Matrix::make('tournament.prizes')
                ->title(__('List of prizes'))
                ->columns([
                    'Position',
                    'Amount',
                ]),


            CheckBox::make('tournaments.is_public')
                ->sendTrueOrFalse()
            ->title('Is Public Tournament?')
            ->help("Uncheck this to set tournament to private | Doesn't do anything yet"),

            DateTimer::make('tournament.scheduled_start_date')
                ->title('Scheduled Start Date & Time')
                ->enableTime()
                ->required(),

            DateTimer::make('tournament.scheduled_end_date')
                ->title('Scheduled End Date & Time | Leave blank if required')
                ->enableTime()
                ->required(),
        ];
    }
}
