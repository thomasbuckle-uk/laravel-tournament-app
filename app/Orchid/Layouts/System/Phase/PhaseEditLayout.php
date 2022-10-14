<?php

namespace App\Orchid\Layouts\System\Phase;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class PhaseEditLayout extends Rows
{

    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('phase.phase_name')
            ->type('text')
            ->max(255)
            ->required()
            ->title(__('Phase Name'))
            ->placeholder(__('Phase Name')),

            Input::make('phase.description')
            ->type('text')
            ->required()
            ->title(__('Description'))
            ->placeholder('Description...')
        ];
    }
}
