<?php

namespace App\Orchid\Layouts\System\Tournament;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
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

            Input::make('tournament.participant_type')
                ->type('text')
                ->required()
                ->title(__('Replace with drop down eventually'))
                ->placeholder('Description...'),

            Input::make('tournament.size')
                ->type('text')
                ->required()
                ->title(__('Size of team/solo (EG 1)'))
                ->placeholder('Description...'),

            Input::make('tournament.timezone')
                ->type('text')
                ->required()
                ->title(__('3 Letter Timezone (EG EST)'))
                ->placeholder('Description...'),


            Select::make('tournament.platforms')
                ->options([
                    '1' => 'PC',
                    '2' => 'Xbox',
                    '3' => 'PS5'
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

            Input::make('tournament.prizes')
                ->type('text')
                ->disabled()
                ->title(__('List of prizes, turn into JSON Columns add table eventually'))
                ->placeholder('Description...'),
        ];
    }
}
