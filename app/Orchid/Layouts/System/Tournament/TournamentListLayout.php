<?php

namespace App\Orchid\Layouts\System\Tournament;

use App\Models\Phase;
use App\Models\Tournament;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class TournamentListLayout extends Table
{
    public $target = 'tournament';

    protected function columns(): array
    {
        return
            [
                TD::make('tournament_name', 'Name')
                    ->sort(),
                TD::make('scheduled_start_date', 'Start Date'),
                TD::make(__('Actions'))
                    ->align(TD::ALIGN_CENTER)
                    ->width('100px')
                    ->render(function (Tournament $tournament) {
                        return DropDown::make()
                            ->icon('options-vertical')
                            ->list([

                                Link::make(__('Edit'))
                                    ->route('platform.tournaments.edit', $tournament->id)
                                    ->icon('pencil'),


                            ]);
                    })
            ];
    }
}
