<?php

namespace App\Orchid\Layouts\System\Phase;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PhaseSettingsListLayout extends Table
{

    public $target = 'phase_settings';

    protected function columns(): iterable
    {
        // TODO: Implement columns() method.

        return
            [
                TD::make('name', __('name'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
            ];
    }
}

