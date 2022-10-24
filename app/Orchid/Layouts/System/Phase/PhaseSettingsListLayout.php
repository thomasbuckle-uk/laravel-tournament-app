<?php

namespace App\Orchid\Layouts\System\Phase;

use App\Models\PhaseSetting;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class PhaseSettingsListLayout extends Table
{

    public $target = 'phase_settings';

    protected function columns(): iterable
    {
        // TODO: Implement columns() method.

        return
            [
                TD::make('name', __('Name'))
                ->sort()
                ->cantHide()
                ->filter(Input::make()),

                TD::make('data_type', __('Type'))
                    ->sort()
                    ->cantHide()
                    ->filter(Input::make()),

                TD::make('description', __('Description'))
                    ->sort()
                    ->cantHide()
                    ->filter(Input::make()),

                TD::make('values', __('Values'))
                    ->cantHide()
                    ->render(function (PhaseSetting $target){

                        $arr = (array) json_decode($target->values, true);
                        $output = '';
                        foreach ( $arr as $key => $val) {
                            $output .= '<li> Value: ' . $val['Value'] .'</li>
                                        <li>Attribute: ' . $val['Attribute'] .'</li>' ;
                        }
                        return $output;

                    }),

                TD::make()
                    ->render( function( PhaseSetting $target){
                       return Button::make()
                            ->icon('trash')
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $target->id,
                            ]);
                    }),

            ];
    }
}

