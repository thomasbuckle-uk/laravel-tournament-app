<?php

namespace App\Orchid\Layouts\System\Phase;

use App\Models\Phase;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PhaseListLayout extends Table
{
    public $target = 'phase';

    protected function columns(): array
    {

        return
            [
                TD::make('phase_name','Name')
                ->sort(),
                TD::make('description', 'Description'),
                TD::make(__('Actions'))
                    ->align(TD::ALIGN_CENTER)
                    ->width('100px')
                ->render( function (Phase $phase) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([

                            Link::make(__('Edit'))
                            ->route('platform.systems.phases.edit', $phase->id)
                            ->icon('pencil'),

                            Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Once removed this phase will be completely deleted please make sure there are no active tournaments using this phase'))
                            ->method('remove', [
                                'id' => $phase->id,
                            ]),
                        ]);
                })
            ];
    }
}
