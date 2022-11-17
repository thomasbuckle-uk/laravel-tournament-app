<?php

namespace App\Orchid\Screens\Tournament;

use App\Models\Phase;
use App\Models\Tournament;
use App\Orchid\Layouts\System\Tournament\TournamentEditLayout;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class TournamentEditScreen extends Screen
{



    /**
     * Query data.
     *
     * @return array
     */
    public function query(Tournament $tournament): iterable
    {
        # Return "Tournament" with its attached settings
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
        return 'Edit Tournament';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Edit Tournament Details Here';
    }

    /**
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
            'platform.tournaments.edit',
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
            Layout::block(TournamentEditLayout::class)
            ->title(__('Tournament Basic Info'))
            ->description(__('Enter Basic Tournament Info Here'))
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
