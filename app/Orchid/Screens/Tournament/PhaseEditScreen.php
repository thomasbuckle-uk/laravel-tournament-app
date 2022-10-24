<?php

namespace App\Orchid\Screens\Tournament;

use App\Models\Phase;
use App\Models\PhaseSetting;
use App\Orchid\Layouts\System\Phase\PhaseEditLayout;
use App\Orchid\Layouts\System\Phase\PhaseSettingEditLayout;
use App\Orchid\Layouts\System\Phase\PhaseSettingsListLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class PhaseEditScreen extends Screen
{


    /**
     * @var Phase
     */
    public Phase $phase;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Phase $phase): iterable
    {
        $phase->load(['settings']);
        return [
            'phase' => $phase,
            'phase_settings' => $phase->settings()->get()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->phase->exists ? 'Edit Phase' : 'Create Phase';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Here we create a tournament Phase and apply any relevant settings it may require. Read Docs for more info';
    }

    /**
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
            'platform.systems.phases',
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [


            Button::make(__('Remove'))
                ->icon('trash')
                ->confirm(__('Once the phase is deleted, all of its resources and data will be permanently deleted. Before deleting, please ensure this phase is not being used. DEV TODO - Apply disable button + soft delete'))
                ->method('remove')
                ->canSee($this->phase->exists),

            Button::make(__('Save'))
                ->icon('check')
                ->method('save'),
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]|string[]
     */
    public function layout(): iterable
    {
        if ($this->phase->exists) {
            return [

                Layout::block(PhaseEditLayout::class)
                    ->title(__('Phase Information'))
                    ->description(__('Enter Phase Name and Description here'))
                    ->commands(
                        Button::make(__('Save Info'))
                            ->type(Color::DEFAULT())
                            ->icon('check')
                            ->canSee($this->phase->exists)
                            ->method('saveInfo')
                    ),

                Layout::block(PhaseSettingEditLayout::class)
                    ->title(__('Phase Settings'))
                    ->description(__('Enter Phase Settings here, you can create as many key -> value rows as you wish'))
                    ->commands(
                        Button::make(__('Save'))
                            ->type(Color::DEFAULT())
                            ->icon('check')
                            ->canSee($this->phase->exists)
                            ->method('saveSettings')
                    ),


                Layout::block(PhaseSettingsListLayout::class)
                    ->title('Current Settings'),


            ];
        } else {
            return [

                Layout::block(PhaseEditLayout::class)
                    ->title(__('Phase Information'))
                    ->description(__('Enter Phase Name and Description here')),

//
//                Layout::block(PhaseSettingEditLayout::class)
//                    ->title(__('Phase Settings'))
//                    ->description(__('Enter Phase Settings here, you can create as many key -> value rows as you wish'))
//                ,
            ];
        }
    }

    public function save(Phase $phase, Request $request)
    {
        $phase->fill($request->collect('phase')->except(['phase_name_slug'])->toArray())
            ->fill(['phase_name_slug' => Str::of($request->input('phase.phase_name'))->slug('-') ])
            ->save();
        Toast::info(__('Phase was saved. Now Configure Phase Settings'));
        return redirect()->route('platform.systems.phases');

    }

    public function saveInfo(Phase $phase, Request $request){
        $phase->fill($request->collect('phase')->except(['phase_name_slug'])->toArray())
            ->fill(['phase_name_slug' => Str::of($request->input('phase.phase_name'))->slug('-') ])
            ->save();
        Toast::info(__('Phase Information was updated'));
    }

    public function saveSettings(Phase $phase, Request $request){
        $data = $request->collect('phase_settings')->except(['values'])->toArray();

        $data['values'] = json_encode($request->input('phase_settings.values'));
        $phase->settings()->create($data);
    }
}
