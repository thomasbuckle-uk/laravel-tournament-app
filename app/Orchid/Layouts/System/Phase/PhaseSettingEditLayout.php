<?php

namespace App\Orchid\Layouts\System\Phase;

use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;

class PhaseSettingEditLayout extends Rows
{

    protected function fields(): iterable
    {
        return [
            Input::make('phase_settings.name')
            ->type('text')
            ->max('255')
            ->required()
            ->title(__('Name'))
            ->placeholder(__('Phase Setting Name')),

        ];
    }
}

//
//Input::make('user.name')
//    ->type('text')
//    ->max(255)
//    ->required()
//    ->title(__('Name'))
//    ->placeholder(__('Name')),
