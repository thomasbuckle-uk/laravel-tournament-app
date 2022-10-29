<?php

namespace App\Orchid\Layouts\System\Game;

use App\Models\Game;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Repository;
use Orchid\Screen\TD;

class GameListLayout extends Table
{
    public $target = 'game';

    protected function columns(): array
    {
        return
            [
                TD::make('game_title', 'Game Title')
                    ->sort(),
                TD::make('available_platforms', 'Available Platforms'),

                TD::make('state_active', 'Game Enabled on Platform')
                    ->render(function (Game $game) {
                        if ($game->state_active === false) {
                            return 'Disabled';
                        }

                        if ($game->state_active === true) {
                            return 'Enabled';
                        }

                        return 'Active State not found';
                    }),
                TD::make(__('Actions'))
                    ->align(TD::ALIGN_CENTER)
                    ->width('100px')
                    ->render(function (Game $game) {
                        return DropDown::make()
                            ->icon('options-vertical')
                            ->list([

                                Link::make(__('Edit'))
                                    ->route('platform.systems.games.edit', $game->id)
                                    ->icon('pencil'),

                                Button::make(__('Delete'))
                                    ->icon('trash')
                                    ->confirm(
                                        __(
                                            'Once removed this game will be completely deleted please make sure there are no active tournaments using this phase'
                                        )
                                    )
                                    ->method('remove', [
                                        'id' => $game->id,
                                    ]),
                            ]);
                    })
            ];
    }

}
