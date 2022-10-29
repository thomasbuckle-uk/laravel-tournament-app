<?php

namespace App\Orchid\Layouts\System\Game;

use App\Models\Game;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class GameEditLayout extends Rows
{

    /**
     * Views.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [

            Input::make('game.game_title')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Game Title')),

            Input::make('game.available_platforms')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Available Platforms')),

            Input::make('game.game_photo_path')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('No function currently')),

            Checkbox::make('game.state_active')
                ->placeholder('Enable')
                ->required()
                ->sendTrueOrFalse()
                ->title(__('Enables ability to create tournaments for this game')),

        ];
    }
}
