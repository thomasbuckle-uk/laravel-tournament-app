<?php

namespace App\Orchid\Screens\Tournament;

use App\Models\Phase;
use App\Orchid\Layouts\System\Phase\PhaseEditLayout;
use App\Orchid\Layouts\System\Phase\PhaseSettingEditLayout;
use App\Orchid\Layouts\System\Phase\PhaseSettingsListLayout;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Screen;

class PhaseEditScreen extends Screen
{


    public $phase;

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
        return 'Here we create a tournament Phase and apply any relevent settings it may require. Read Docs for more info';
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
        return [

            Layout::block(PhaseEditLayout::class)
            ->title(__('Phase Information'))
            ->description(__('Enter Phase Name and Description here'))
            ->commands(
                Button::make(__('Save'))
                ->type(Color::DEFAULT())
                ->icon('check')
                ->canSee($this->phase->exists)
                ->method('save')
            ),

            Layout::block(PhaseSettingEditLayout::class)
                ->title(__('Phase Settings'))
                ->description(__('Enter Phase Settings here, you can create as many key -> value rows as you wish'))
            ,

            Layout::block(PhaseSettingsListLayout::class)
            ->title('Current Settings')
        ];
    }
}
