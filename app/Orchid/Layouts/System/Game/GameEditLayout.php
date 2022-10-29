<?php

namespace App\Orchid\Layouts\System\Game;

use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\TD;

class GameEditLayout extends Rows
{


    protected function fields(): iterable
    {        return [

        TD::make('game_name', 'name')
            ->sort(),

    ];// TODO: Implement fields() method.
    }
}
