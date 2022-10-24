<?php

namespace App\Orchid\Layouts\System\Phase;

use App\Models\PhaseSetting;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\Relation;
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
            ->title(__('Name'))
            ->placeholder(__('Phase Setting Name')),

            Input::make('phase_settings.data_type')
                ->type('text')
                ->max('255')
                ->title(__('Data Type'))
                ->placeholder(__('Type of Data - Number, Text etc')),

            Input::make('phase_settings.description')
                ->type('text')
                ->title(__('Description'))
                ->placeholder(__('Description Text')),

            Matrix::make('phase_settings.values')
                ->title(__('Range Values (Optional)'))
                ->help('Constrains a setting to only be set to a range of values')
                ->columns([
                    'Attribute',
                    'Value',
                ]),


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
