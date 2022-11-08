<?php

namespace App\Orchid\Screens\Tournament\Create;

use App\Models\Phase;
use App\Models\Tournament;
use App\Orchid\Layouts\System\Phase\PhaseEditLayout;
use App\Orchid\Layouts\System\Phase\PhaseSettingEditLayout;
use App\Orchid\Layouts\System\Phase\PhaseSettingsListLayout;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class TournamentCreateScreen extends Screen
{



    /**
     * Query data.
     *
     * @return array
     */
    public function query(Tournament $tournament): iterable
    {
        # Return all "Phases" with their attached settings
        return [
            'tournament' => $tournament,
        ];
    }


    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Create Tournament';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Tournament Setup. Read Docs for more info';
    }

    /**
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
            'platform.tournaments.create',
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

//                Layout::block(PhaseEditLayout::class)
//                    ->title(__('Phase Information'))
//                    ->description(__('Enter Phase Name and Description here')),

            ];
    }

    public function save(Phase $phase, Request $request): RedirectResponse
    {
//        $phase->fill($request->collect('phase')->except(['phase_name_slug'])->toArray())
//            ->fill(['phase_name_slug' => Str::of($request->input('phase.phase_name'))->slug('-') ])
//            ->save();
        Toast::info(__('Test'));
        return redirect()->route('platform.tournaments');

    }

}
